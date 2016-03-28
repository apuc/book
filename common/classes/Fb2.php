<?php
/**
 * Created by PhpStorm.
 * User: apuc0
 * Date: 27.03.2016
 * Time: 21:59
 */

namespace common\classes;


use SimpleXMLElement;
use yii\helpers\Url;

class Fb2
{

    public $xml;
    public $title;
    public $annotation;
    public $author;

    function __construct($file)
    {
        $file = file_get_contents($file);
        $this->xml = new SimpleXMLElement($file);
        $this->getTitle();
        $this->getAnnotation();
        $this->getAuthor();
    }

    /**
     * Получение названия книги
     * @return mixed
     */
    public function getTitle(){
        $arr = (array)$this->xml->description->{'title-info'}->{'book-title'};
        return $this->title = $arr[0];
    }

    /**
     * Получение анотации книги
     * @return string
     */
    public function getAnnotation(){
        $res = $this->xml->description->{'title-info'}->{'annotation'}->p;
        if(is_object($res)){
            $a = '';
            foreach($res as $r){
                $a .= "<p>". $r . "</p>";
            }
            return $this->annotation = $a;
        }
        else {
            return $this->annotation = $this->xml->description->{'title-info'}->{'annotation'}->p;
        }
    }

    /**
     * Получение автора книги
     * @return object
     */
    public function getAuthor(){
        return $this->author = $this->xml->description->{'title-info'}->{'author'};
    }

}