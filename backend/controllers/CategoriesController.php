<?php

namespace backend\controllers;

use common\model\Categories;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\web\UploadedFile;
use common\helper\ImgCateHelper;

/**
 * CategoriesController implements the CRUD actions for Categories model.
 */
class CategoriesController extends base\CategoriesController {
   
   
    public function actionCreate()
    {
        // $model = new \common\models\Categories();

        $model = new \common\models\Categories();

        $loadImg = new \common\helper\ImageHelper();
        // if ($this->request->isPost) {
        //     if ($model->load($this->request->post()) && $model->save()) {
        //         return $this->redirect(['view', 'id_category' => $model->id_category]);
        //     }
        // } else {
        //     $model->loadDefaultValues();
        // }

        // return $this->render('create', [
        //     'model' => $model,
        // ]);

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

            $path = '/categories' ;
            $loadImg->updateImgCategory($model, $model->file_image, $path);

            if($model->file_image){
                $model->file_image->saveAs('../../image/category/' . time() . '_' . $model->file_image->name);
                unlink('../../image/category/'.$model->image);
                $model->image = time() . '_' . $model->file_image->name;
            } else {
                $model->file_image = $old_ImgCate;
            }

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
        $this->findModel($id_category)->delete();

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