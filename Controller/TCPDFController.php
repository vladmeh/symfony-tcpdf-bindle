<?php
/**
 * Created by VladMeh.
 * @link http://www.vladmeh.com
 * @author Vladimir Mikhaylov <vladmeh@gmail.com>
 *
 */

namespace Vladmeh\Bundle\TCPDFBundle\Controller;

require_once __DIR__.'../../../../vendor/tecnickcom/tcpdf/tcpdf.php';

class TCPDFController extends \TCPDF
{
    /**
     * TCPDFController constructor.
     */
    public function __construct()
    {
        parent::__construct(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
    }
}