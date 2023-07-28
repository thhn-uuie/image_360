<?php

namespace backend\controllers;

use common\helper\File360Helper;
use common\models\Products;
use common\helper\ImageHelper;
use common\models\search\ProductsSearch;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;
use backend\components\PngWriter;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use common\models\base\Categories;



/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends base\ProductsController
{
    public function actionIndex()
    {
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        if (Yii::$app->user->identity->id_role == 2) {
            $dataProvider = new ActiveDataProvider([
                'query' => Products::find()->where(['created_by' => Yii::$app->user->identity->username]),
            ]);
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCreate()
    {

        $model = new Products();

        //lấy danh sách các danh mục có status là 'hiện'
        $cate = Categories::find()->where(['status'=>'Hiện'])->all();
        $categoryList = ArrayHelper::map($cate,'id_category', 'name_category');

        $loadImg = new ImageHelper();

        $load360 = new File360Helper();

        
        if ($model->load(Yii::$app->request->post())) {
            $model->file_360 = UploadedFile::getInstance($model, 'file_360');
            $model->file_image =UploadedFile::getInstance($model, 'file_image');
            $model->qr;

//            $idPath = $model->getRecordPrevious($model);
            if (!empty($model->qr)) {
                $qrImg = Yii::getAlias('@image_360/qr/') . $model->qr->name;
                $model->qr->saveAs($qrImg);
            } else {
                $qrPath = $model->createQR();
                $model->qr_code = basename($qrPath);
                $model->setAttribute('qr_code', $model->qr_code);
                $model->qr = UploadedFile::getInstance($model, 'qr');
            }

            // Upload image
            $path = '/products' ;
            $loadImg->loadImgProducts($model, $model->file_image, $path);

            // Upload image 360

//            if ($model->file_360) {
//                $model->file_360->saveAs('../../file360/' . time() . '_' . $model->file_360->name);
//
//                $model->files = time() . '_' . $model->file_360->name;
//            }

            $path360 = '/file360';
            $load360->loadFile360($model, $model->file_360, $path360);

            if ($model -> save(false)) {
                //Yii::$app->session->addFlash('success', 'Thêm mới thành công');
                return $this->redirect((['view', 'id_products' => $model->id_products]));
            } else {

                //Yii::$app->session->addFlash('danger', 'Thêm mới không thành công');
                return $this->render('create', [
                    'model' => $model,
                    'categoryList' => $categoryList,
                ]);
            }

        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }


    public function actionUpdate($id_products)
    {
        $model = $this->findModel($id_products);

        $old_360 = $model->files;
        $loadImg = new ImageHelper();


        if ($model->load(Yii::$app->request->post()))
        {
            $model->file_image =  UploadedFile::getInstance($model, 'file_image');
            $model->file_360 = UploadedFile::getInstance($model, 'file_360');


//            $idPath = $this->getRecordPrevious();

            $path = '/products' ;
            $loadImg->updateImage($model, $model->file_image, $path);

            if($model->file_360){
                $model->file_360->saveAs('../../image/file360/' . time() . '_' . $model->file_360->name);
                unlink('../../image/file360/'.$model->files);
                $model->files = time() . '_' . $model->file_360->name;
            } else {
                $model->file_360 = $old_360;
            }

            if ($model->save(false)) {
                return $this->redirect(['view', 'id_products' => $model->id_products]);
            } else {
                return $this->render('update', [
                    'model' => $model,
                ]);
            }


        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }


    public function actionDelete($id_products)
    {
        $model = $this->findModel($id_products);
        $model -> delete();
        unlink('../../image/products/' . $model->image);
        unlink('../../image/file360/' . $model->files);
        return $this->redirect(['index']);
    }

    public function actionView($id_products)
    {
        $viewProducts = \common\models\base\View::findOne(['id_products' => $id_products]);
        if ($viewProducts !== null) {
            $viewProducts->view_count += 1;
            $viewProducts->save();
        } else {
            $model= new \common\models\base\View();
            $model->id_products = $id_products;
            $model->view_count += 1;
            $model->save();
        }
        return $this->render('view', [
            'model' => $this->findModel($id_products),
        ]);
    }
}