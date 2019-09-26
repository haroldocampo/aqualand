<?php
/**
 * Created by PhpStorm.
 * User: root
 * Date: 9/26/19
 * Time: 10:31 PM
 */

namespace AppBundle\Twig;


use AppBundle\Service\MarkdownTransformer;

class MarkdownExtension extends \Twig_Extension
{
    /**
     * @var MarkdownTransformer
     */
    private $markdownTransformer;

    public function __construct(MarkdownTransformer $markdownTransformer)
    {

        $this->markdownTransformer = $markdownTransformer;
    }

    public function getFilters(){
        return [
            new \Twig_SimpleFilter('markdownify', array($this, 'parseMarkdown'), ['is_safe' => ['html']]),

        ];
    }

    public function parseMarkdown($str){
        return $this->markdownTransformer->parse($str);
    }

    public function getName(){
        return 'app_markdown';
    }
}