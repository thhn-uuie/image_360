<?php

namespace backend\controllers;

use common\models\Products;
use common\models\search\ProductsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;
use backend\components\PngWriter;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;

/**
 * ProductsController implements the CRUD actions for Products model.
 */
class ProductsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::class,
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Products models.
     *
     * @return string
     */
    public function actionIndex()
    {
        // $dataProvider = new ActiveDataProvider([
        //     'query' => Product::find(),
        // ]);
//        $productsCount = Products::getProductsCount();
//        return $this->render('index', [
//            'getProductsCount'=> $getProductsCount,
//        ]);
        
        $searchModel = new ProductsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Products model.
     * @param int $id_products Id Products
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */

     

    public function actionView($id_products)
    {
        return $this->render('view', [
            'model' => $this->findModel($id_products),
        ]);
    }

    /**
     * Creates a new Products model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new \common\models\Products();

        $loadImg = new \common\helper\ImageHelper();

        if ($model->load(Yii::$app->request->post())) {
            $model->file_360 = UploadedFile::getInstance($model, 'file_360');
            $model->file_image =UploadedFile::getInstance($model, 'file_image');
            $model->qr;

            // if (($model->qr)) {
            //     $model->qr_code = $model->createQR();
            //     $model->qr->saveAs('../../qr' . $model->qr->name);
            // }

            // if (!empty($model->qr)) {
            //     $model->qr->saveAs('../../qr' . $model->qr->name);
            // } else {
            //     $model->qr_code = $model->createQR();
            //     $model->qr->saveAs('../../qr' . $model->qr->name);
            // }

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
            $loadImg->loadImgProducts($model, $model->file_image, '../../uploads/');

            // Upload image 360
           
            if ($model->file_360) {
                $model->file_360->saveAs('../../file360/' . time() . '_' . $model->file_360->name);
                $model->files = time() . '_' . $model->file_360->name;
            }

            if ($model -> save(false)) {
                  //Yii::$app->session->addFlash('success', 'Thêm mới thành công');
                return $this->redirect((['view', 'id_products' => $model->id_products]));
            } else {
                //Yii::$app->session->addFlash('danger', 'Thêm mới không thành công');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
        
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    
    /**
     * Updates an existing Products model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_products Id Products
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_products)
    {
        $model = $this->findModel($id_products);
        $old_image = $model->image;
        $old_360 = $model->files;

        if ($model->load(Yii::$app->request->post()))
        {
            $model->file_image =  UploadedFile::getInstance($model, 'file_image');
            $model->file_360 = UploadedFile::getInstance($model, 'file_360');

            if($model->file_image){
                $model->file_image->saveAs('../../uploads/' . time() . '_' .$model->file_image->name);
                unlink('../../uploads/'.$model->image);
                $model->image = time() . '_' . $model->file_image->name;

            } else {
                $model->file_image = $old_image;
            }

            if($model->file_360){
                $model->file_360->saveAs('../../file360/' . time() . '_' . $model->file_360->name);
                unlink('../../file360/'.$model->files);
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

    /**
     * Deletes an existing Products model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_products Id Products
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_products)
    {
        $model = $this->findModel($id_products);
        $model -> delete();
        // unlink('../../uploads/' . $model->image);
        // unlink('../../file360/' . $model->files);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Products model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_products Id Products
     * @return Products the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_products)
    {
        if (($model = Products::findOne(['id_products' => $id_products])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
