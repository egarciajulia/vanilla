<?php
/**
 * @copyright 2009-2018 Vanilla Forums Inc.
 * @license GPL-2.0-only
 * @since 2.8
 */

namespace Vanilla\Web\Assets;

/**
 * A class representing the polyfill file loaded by
 * @see WebpackAssetProvider::getInlinePolyfillContents();
 */
class PolyfillAsset extends SiteAsset {
    /**
     * @inheritdoc
     */
    public function getWebPath(): string {
        return $this->makeAssetPath(
            'dist',
            'polyfills.min.js' . '?h='.$this->cacheBuster->value()
        );
    }
}
