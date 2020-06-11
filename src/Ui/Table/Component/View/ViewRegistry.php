<?php

namespace Anomaly\Streams\Platform\Ui\Table\Component\View;

use Illuminate\Support\Arr;
use Anomaly\Streams\Platform\Ui\Table\Component\View\Type\All;
use Anomaly\Streams\Platform\Ui\Table\Component\View\Type\Trash;
use Anomaly\Streams\Platform\Ui\Table\Component\View\Type\RecentlyCreated;
use Anomaly\Streams\Platform\Ui\Table\Component\View\Type\RecentlyModified;

/**
 * Class ViewRegistry
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class ViewRegistry
{

    /**
     * Available views.
     *
     * @var array
     */
    protected $views = [
        'all'               => [
            'slug' => 'all',
            'text' => 'streams::view.all',
        ],
        'trash'             => [
            'slug'    => 'trash',
            'text'    => 'streams::view.trash',
            'view'    => Trash::class,
            'buttons' => [
                'restore' => [],
            ],
            'actions' => [
                'force_delete' => [],
            ],
            'options' => [
                'sortable' => false,
            ],
        ],
        'recently_created'  => [
            'slug' => 'recently_created',
            'text' => 'streams::view.recently_created',
            'view' => RecentlyCreated::class,
        ],
        'recently_modified' => [
            'slug' => 'recently_modified',
            'text' => 'streams::view.recently_modified',
            'view' => RecentlyModified::class,
        ],
    ];

    /**
     * Get a view.
     *
     * @param  $view
     * @return null|array
     */
    public function get($view)
    {
        if (!$view) {
            return null;
        }

        return Arr::get($this->views, $view);
    }

    /**
     * Register a view.
     *
     * @param        $view
     * @param  array $parameters
     * @return $this
     */
    public function register($view, array $parameters)
    {
        Arr::set($this->views, $view, $parameters);

        return $this;
    }
}
