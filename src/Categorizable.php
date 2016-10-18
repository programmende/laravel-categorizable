<?php

namespace Programmende\Categorizable;

use Kalnoy\Nestedset\NodeTrait;
use Programmende\Categorizable\Category;
use Kalnoy\Nestedset\Collection;

trait Categorizable
{

    use NodeTrait;

    /**
     * Fetch all categories for the model.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function categories()
    {
        return $this->morphMany(Category::class, 'categorizable');
    }

    /**
     * Fetch all categories for the model as category tree.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getCategoryTree()
    {
        return $this->categories()->defaultOrder()->withDepth()->get()->toFlatTree();
    }

    /**
     * Fetch all categories for the model as options array.
     *
     * @return Array
     */
    public function getCategoryOptions($except = null)
    {
        $query = $this->categories()->select('id', 'name')->defaultOrder()->withDepth();
        if ($except) {
            $query->whereNotDescendantOf($except)->where('id', '<>', $except->id)->defaultOrder();
        }
        return $this->makeOptions($query->get());
    }

    /**
     *  Make the category options array.
     *
     * @return Array
     */
    protected function makeOptions(Collection $items)
    {
        $options = ['' => 'Root'];
        foreach ($items as $item) {
            $options[$item->getKey()] = str_repeat('&nbsp;&nbsp;&nbsp;', $item->depth) . ' ' . $item->name;
        }
        return $options;
    }

}
