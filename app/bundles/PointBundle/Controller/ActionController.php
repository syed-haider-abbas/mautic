<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic, NP. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.com
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\PointBundle\Controller;

class ActionController extends CommonActionController
{

    public function __construct()
    {
        $this->permissionName = "points";
        $this->actionVar      = "pointaction";
        $this->modelName      = "point";
        $this->formName       = "pointaction";
        $this->templateVar    = "Point";
        $this->mauticContent  = "pointAction";
        $this->routeVar       = "pointaction";
        $this->entityClass    = "Action";
    }
}