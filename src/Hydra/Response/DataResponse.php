<?php
/**
 * This file is part of Hydra, the cozy RESTfull PHP5.3 micro-framework.
 *
 * @link        https://github.com/z7/hydra
 * @author      Sandu Lungu <sandu@lungu.info>
 * @package     hydra
 * @subpackage  core
 * @filesource
 * @license     http://www.opensource.org/licenses/MIT MIT
 */

namespace Hydra\Response;

use Hydra\Request;
use Hydra\Response;

/**
 * Webservice response holder.
 * 
 * @property string $body
 */
class DataResponse extends RenderedResponse {
    
    var $data;

    function __construct(Request $request, $data = array(), $title = null) {
        parent::__construct($request, $title);
        $this->data = $data;
    }
    
    function render($render_stream = true) {
        if (!isset($this->content)) {
            $method = "dump__$this->format";
            $this->variables['body'] = $this->app->$method($this->data);
            return parent::render($render_stream);
        }
        return $this->content;
    }
    
}
