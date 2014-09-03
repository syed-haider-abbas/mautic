<?php
/**
 * @package     Mautic
 * @copyright   2014 Mautic, NP. All rights reserved.
 * @author      Mautic
 * @link        http://mautic.com
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace Mautic\EmailBundle\Controller;

use Mautic\CoreBundle\Controller\AjaxController as CommonAjaxController;
use Mautic\CoreBundle\Helper\InputHelper;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class AjaxController
 *
 * @package Mautic\PageBundle\Controller
 */
class AjaxController extends CommonAjaxController
{

    /**
     * @param Request $request
     *
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    protected function setBuilderContentAction(Request $request)
    {
        $newContent = InputHelper::html($request->request->get('content'));
        $email      = InputHelper::clean($request->request->get('email'));
        $slot       = InputHelper::clean($request->request->get('slot'));
        $dataArray  = array('success' => 0);
        if (!empty($email) && !empty($slot)) {
            $session = $this->factory->getSession();
            $content = $session->get('mautic.emailbuilder.'.$email.'.content', array());
            $content[$slot] = $newContent;
            $session->set('mautic.emailbuilder.'.$email.'.content', $content);
            $dataArray['success'] = 1;
        }
        return $this->sendJsonResponse($dataArray);
    }
}