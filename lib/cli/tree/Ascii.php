<?php
/**
 * PHP Command Line Tools
 *
 * This source file is subject to the MIT license that is bundled
 * with this package in the file LICENSE.
 *
 * @author    Ryan Sullivan <rsullivan@connectstudios.com>
 * @copyright 2010 James Logsdom (http://girsbrain.org)
 * @license   http://www.opensource.org/licenses/mit-license.php The MIT License
 */

namespace cli\tree;

/**
 * The ASCII renderer renders trees with ASCII lines.
 */
class Ascii extends Renderer {

    /**
     * @param array $tree
     * @return string
     */
    public function render(array $tree, $cycle=0)
    {
        $output = '';

        foreach ($tree as $key => $value) {
            if (is_array($value)) {
                $output .= $this->displayDepth($cycle) . $key . "\n";
                $output .= $this->render($value, $cycle+1);
            } else {
                $output .= $this->displayDepth($cycle) . $value . "\n";
            }
        }

        return $output;
    }

    /**
     * @param int $cycle
     * @return string
     */
    private function displayDepth($cycle)
    {
        if ($cycle == 0) {
            return '/';
        } else {
            $a   = 0;
            $out = '';
            while ($a < $cycle) {
                $out .= '  ';
                $a++;
            }

            return $out . '/';
        }
    }
}
