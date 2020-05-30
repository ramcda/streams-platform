<?php

namespace Anomaly\Streams\Platform\Ui\Support\Workflows;

use Anomaly\Streams\Platform\Ui\Support\Builder;

/**
 * Class ResolveComponent
 *
 * @link   http://pyrocms.com/
 * @author PyroCMS, Inc. <support@pyrocms.com>
 * @author Ryan Thompson <ryan@pyrocms.com>
 */
class ResolveComponent
{

    /**
     * Hand the step.
     *
     * @param Builder $builder
     */
    public function handle(Builder $builder)
    {
        $resolved = resolver(
            $this->builder->{$builder->component},
            ['builder' => $this->builder]
        );

        $this->builder->{$builder->component} = evaluate(
            $resolved ?: $this->builder->{$builder->component},
            ['builder' => $this->builder]
        );
    }
}
