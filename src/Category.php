<?php

namespace Programmende\Categorizable;

use Kalnoy\Nestedset\Node;

class Category extends Node
{

    public $timestamps = false;

    /**
     * Fillable fields for a comment.
     *
     * @var array
     */
    protected $fillable = ['name', 'slug', '_lft', '_rgt', 'parent_id'];
}
