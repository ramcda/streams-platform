<?php

namespace Anomaly\Streams\Platform\Addon\Extension;

use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Anomaly\Streams\Platform\Addon\AddonCollection;

/**
 * Class ExtensionCollection
 *
 * @link    http://pyrocms.com/
 * @author  PyroCMS, Inc. <support@pyrocms.com>
 * @author  Ryan Thompson <ryan@pyrocms.com>
 */
class ExtensionCollection extends AddonCollection
{

    /**
     * Search for and return matching extensions.
     *
     * @param  mixed               $pattern
     * @param  bool                $intance
     * @return ExtensionCollection
     */
    public function search($pattern, $instance = true)
    {
        return $this->filter(function (array $addon) use ($pattern) {
            return Str::is($pattern, Arr::get($addon, 'extra.streams.provides')) ? $addon : null;
        });
    }
}
