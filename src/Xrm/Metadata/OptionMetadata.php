<?php
/**
 * Copyright 2018 AlexaCRM
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy of this software and
 * associated documentation files (the "Software"), to deal in the Software without restriction, including
 * without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is furnished to do so,
 * subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED,
 * INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR
 * PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS
 * BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT,
 * TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE
 * OR OTHER DEALINGS IN THE SOFTWARE.
 */

namespace SurveyGizmo\Dynamics\Xrm\Metadata;

use SurveyGizmo\Dynamics\Xrm\Label;

/**
 * Contains metadata representing an option within an Option set.
 */
class OptionMetadata extends MetadataBase {

    /**
     * The hexadecimal value set to assign a color for the option.
     *
     * @var string
     */
    public $Color;

    /**
     * The label containing the description for the option.
     *
     * @var Label
     */
    public $Description;

    /**
     * Whether the option is part of a managed solution.
     *
     * @var bool
     */
    public $IsManaged;

    /**
     * The label containing the text for the option.
     *
     * @var Label
     */
    public $Label;

    /**
     * The value of the option.
     *
     * @var int
     */
    public $Value;

    /**
     * OptionMetadata constructor.
     *
     * @param Label|int $label Option label or value.
     * @param int $value Option value. (Specified if the first argument is a label.)
     */
    public function __construct( $label = null, $value = null ) {
        if ( $label instanceof Label ) {
            $this->Label = $label;

            if ( $value !== null ) {
                $this->Value = $value;
            }
        } elseif ( is_int( $label ) ) {
            $this->Value = $label;
        }
    }

}
