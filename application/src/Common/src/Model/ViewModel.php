<?php
namespace Common\Model;

use Area\Model\AreaModel as AreaModel;
use Block\Model\BlockModel as BlockModel;
use Content\Model\ContentModel as ContentModel;

class ViewModel
{
    /**
     * @var AreaModel|BlockModel|ContentModel|null
     */
    protected $data;
    /**
     * @var AreaModel|null
     */
    protected $area;

    /**
     * @var BlockModel|null
     */
    protected $block;

    /**
     * @var ContentModel|null
     */
    protected $content;

    /**
     * @return AreaModel|BlockModel|ContentModel|null
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * @param AreaModel|BlockModel|ContentModel|null $data
     * @return ViewModel
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * @return AreaModel|null
     */
    public function getArea()
    {
        return $this->area;
    }

    /**
     * @param mixed $area
     * @return ViewModel
     */
    public function setArea(AreaModel $area)
    {
        $this->area = $area;
        return $this;
    }

    /**
     * @return BlockModel|null
     */
    public function getBlock()
    {
        return $this->block;
    }

    /**
     * @param BlockModel $block
     * @return ViewModel
     */
    public function setBlock(BlockModel $block)
    {
        $this->block = $block;
        return $this;
    }

    /**
     * @return ContentModel|null
     */
    public function getContent()
    {
        return $this->content;
    }

    /**
     * @param ContentModel $content
     * @return ViewModel
     */
    public function setContent(ContentModel $content)
    {
        $this->content = $content;
        return $this;
    }

}