<?php

namespace backend\controllers;

use common\models\base\Products;
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
            $model->file_image = UploadedFile::getInstance($model, 'file_image');
            $model->file_360 = UploadedFile::getInstance($model, 'file_360');
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
                //$qrImg = Yii::getAlias('@image_360/qr/') . $model->qr_code;
                $model->setAttribute('qr_code', $model->qr_code);
                $model->qr = UploadedFile::getInstance($model, 'qr');
                //$model->qr->saveAs($qrImg);
            }
            

            if ($model->file_image) {
                $model->file_image->saveAs('../../uploads/' . $model->file_image->name);
                $model->image = $model->file_image->name;
            }

            if ($model->file_360) {
                $model->file_360->saveAs('../../file360/' . $model->file_360->name);
                $model->files = $model->file_360->name;
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
        
        } else{
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

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id_products' => $model->id_products]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
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
        $this->findModel($id_products)->delete();

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
