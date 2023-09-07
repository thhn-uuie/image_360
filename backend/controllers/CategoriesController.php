<?php

namespace backend\controllers;

use common\models\Categories;
use common\models\Products;
use yii\data\Pagination;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;
use common\helper\ImgCateHelper;
use yii\filters\AccessControl;
use common\models\search\CategoriesSearch;
use yii\data\ActiveDataProvider;




/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends base\CategoriesController {

    public function behaviors()
    {
        return [

            'access' => [
                'class' => AccessControl::class,

                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],

                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'actions' => ['create', 'index'],
                    ],
                    [
                        'allow' => true,
                        'roles' => ['@'],
                        'actions' => ['update', 'view', 'delete'],
                        'matchCallback' => function ($rule, $action) {
                            $product = $action->controller->findModel(Yii::$app->request->get('id_category'));
                            $user = Yii::$app->user->identity;
                            if ($user->id_role == 1 || $product->created_by == $user->username) {
                                return true;
                            }
                            return false;
                        },
                    ],

                ],
            ],
            'verbs' => [
                'class' => VerbFilter::class,
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        $searchModel = new CategoriesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);
        if (Yii::$app->user->identity->id_role == 2) {
            $dataProvider = new ActiveDataProvider([
                'query' => Categories::find()->where(['created_by' => Yii::$app->user->identity->username]),
            ]);
        }
        $count = $dataProvider->getTotalCount();

        // Tạo đối tượng Pagination với pageSize là 5
        $pagination = new Pagination(['pageSize' => 5, 'totalCount' => $count]);

        // Áp dụng phân trang vào query
        $dataProvider->setPagination($pagination);
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    public function actionCreate()
    {
        // $model = new \common\models\Categories();

        $model = new \common\models\Categories();

        $loadImg = new \common\helper\ImageHelper();

        if ($model->load(Yii::$app->request->post())) {
            $model->file_image = UploadedFile::getInstance($model, 'file_image');

            // Upload image
            $loadImg->loadImgProducts($model, $model->file_image, '../../image/category/');

            if ($model->save(false)) {
                //Yii::$app->session->addFlash('success', 'Thêm mới thành công');
                return $this->redirect((['view', 'id_category' => $model->id_category]));
            } else {
                //Yii::$app->session->addFlash('danger', 'Thêm mới không thành công');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }

        } else {
            $model->loadDefaultValues();
            return $this->render('create', [
                'model' => $model,
            ]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }
    /**
     * Updates an existing Categories model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id_category Id Category
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id_category)
    {
        $model = $this->findModel($id_category);

        $old_ImgCate = $model->image;
        $loadImg = new ImgCateHelper();


        if ($model->load(Yii::$app->request->post()))
        {
            $model->file_image =  UploadedFile::getInstance($model, 'file_image');

            $path = '/category' ;
            $loadImg->updateImgCategory($model, $model->file_image, $path);

            // if($model->file_image){
            //     $model->file_image->saveAs('../../image/category/' . time() . '_' . $model->file_image->name);
            //     unlink('../../image/category/'.$model->image);
            //     $model->image = time() . '_' . $model->file_image->name;
            // } else {
            //     $model->file_image = $old_ImgCate;
            // }

            if ($model->save(false)) {
                return $this->redirect(['view', 'id_category' => $model->id_category]);
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




        // $model = $this->findModel($id_category);

        

        // if ($model->load(Yii::$app->request->post()) && $model->save()) {
        //     return $this->redirect(['view','id_category'=>$model->id_category]);
        // }

        // return $this->render('update', [
        //     'model' => $model,
        // ]);


        // if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
        //     return $this->redirect(['view', 'id_category' => $model->id_category]);
        // }

        // return $this->render('update', [
        //     'model' => $model,
        // ]);
    }

    /**
     * Deletes an existing Categories model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id_category Id Category
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id_category)
    {
        $findCate = $this->findModel($id_category);
        $productCate = Products::findOne(['id_category' => $findCate]);
        if (!$productCate) {
            $findCate->delete();
            Yii::$app->session->addFlash('success', 'Xóa danh mục ' . $findCate->name_category . ' thành công.');

        } else {
            Yii::$app->session->addFlash('danger', 'Không xóa được do tồn tại sản phẩm có chứa danh mục này');
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the Categories model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id_category Id Category
     * @return Categories the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id_category)
    {
        if (($model = Categories::findOne(['id_category' => $id_category])) !== null) {
            return $model;
        }

    }
}