<?php

namespace backend\controllers;

use backend\base\BackController;
use Yii;
use common\models\Product;
use common\models\ProductImg;
use backend\models\search\ProductSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\helpers\ArrayHelper;
use yii\web\UploadedFile;
use yii\helpers\Url;

use yii\imagine\Image;
use Imagine\Image\Box;
use Imagine\Image\Point;
use Imagine\Gd;
use Imagine\Image\BoxInterface;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BackController
{
    /**
     * {@inheritdoc}
     */
    // public function behaviors()
    // {
    //     return [
    //         'verbs' => [
    //             'class' => VerbFilter::className(),
    //             'actions' => [
    //                 'delete' => ['POST'],
    //             ],
    //         ],
    //     ];
    // }

    public function actionMultiple()
    {
        $upload = new ProductImg();
        $products = Product::find()->andWhere(['status' => 1])->all();

        if ($upload->load(Yii::$app->request->post())) {
            $upload->image = UploadedFile::getInstances($upload, 'image');
            if ($upload->image && $upload->validate()) {
                $fullPath = Yii::getAlias('@frontend/web/storage/products/');
                if (!file_exists(Url::to($fullPath))) {
                    mkdir(Url::to($fullPath), 0777, true);
                }
                foreach ($upload->image as $image) {
                    $model = new ProductImg();
                    $model->product_id = $upload->product_id;
                    $model->image = time() . rand(100, 999) . '.' . $image->extension;
                    if ($model->save(false)) {
                        $image->saveAs($fullPath . $model->image);
                        $imgPath = $fullPath . $model->image;

                        $img = Image::getImagine()->open($imgPath);

                        // $size = $img->getSize();
                        $ratio = 1 / 1;

                        $width = 200;
                        $height = round($width / $ratio);

                        $box = new Box($width, $height);
                        $img->resize($box)->save($imgPath);
                    }
                }
                return $this->redirect(['index']);
            }
        }

        return $this->render('multiple', ['upload' => $upload, 'products' => ArrayHelper::map($products, 'id', 'name')]);
    }

    public function doResize($imageLocation, $imageDestination, array $options = null)
    {
        $newWidth = $newHeight = 0;
        list($width, $height) = getimagesize($imageLocation);

        if (isset($options['newWidth']) || isset($options['newHeight'])) {
            if (isset($options['newWidth']) && isset($options['newHeight'])) {
                $newWidth = $options['newWidth'];
                $newHeight = $options['newHeight'];
            } else if (isset($options['newWidth'])) {
                $deviationPercentage = (($width - $options['newWidth']) / (0.01 * $width)) / 100;

                $newWidth = $options['newWidth'];
                $newHeight = $height - ($height * $deviationPercentage);
            } else {
                $deviationPercentage = (($height - $options['newHeight']) / (0.01 * $height)) / 100;

                $newWidth = $width - ($width * $deviationPercentage);
                $newHeight = $options['newHeight'];
            }
        } else {
            // reduce image size up to 20% by default
            $reduceRatio = isset($options['reduceRatio']) ? $options['reduceRatio'] : 20;

            $newWidth = $width * ((100 - $reduceRatio) / 100);
            $newHeight = $height * ((100 - $reduceRatio) / 100);
        }

        return Image::thumbnail(
            $imageLocation,
            (int) $newWidth,
            (int) $newHeight
        )->save(
            $imageDestination,
            ['quality' => isset($options['quality']) ? $options['quality'] : 100]
        );
    }

    /**
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        $images = ProductImg::find()->andWhere(['product_id' => $id])->all();

        return $this->render('view', [
            'model' => $this->findModel($id),
            'images' => $images,
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Product();
        // $upload = new ProductImg();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
            // 'upload' => $upload
        ]);
    }

    /**
     * Updates an existing Product model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Product model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
