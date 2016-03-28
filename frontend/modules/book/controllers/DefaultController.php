<?php

namespace frontend\modules\book\controllers;

use common\classes\Debug;
use common\classes\Fb2;
use yii\helpers\Url;
use yii\web\Controller;

/**
 * Default controller for the `book` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionBook(){

        $book = new Fb2(Url::base(true).'/books/t.fb2');

        Debug::prn($book->xml);
    }
}
