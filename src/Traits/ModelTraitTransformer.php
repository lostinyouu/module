<?php

namespace Lostinyou\Module\Traits;

trait ModelTraitTransformer
{

    /**
     * 返回格式化后的创建时间
     *
     * @return mixed
     */
    public function createdAtFormat()
    {
        return $this->created_at->toDateTimeString();
    }

    /**
     * 返回格式化后的修改时间
     *
     * @return mixed
     */
    public function updatedAtFormat()
    {
        return $this->updated_at->toDateTimeString();
    }


}
