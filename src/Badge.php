<?php

namespace Igrejanet\Badges;

use Igrejanet\Badges\Contracts\BadgeContract;
use Igrejanet\Badges\Contracts\MembersContract;
use Igrejanet\Badges\Exceptions\EmptyMembersException;
use Igrejanet\Badges\Exceptions\WrongOrientationException;
use Igrejanet\Badges\Person\Company;
use Illuminate\Http\Response;
use Knp\Snappy\Pdf;

/**
 * Badge
 *
 * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
 * @version 3.0.0
 * @since   02/09/2017
 * @package Igrejanet\Badges\Badge
 */
class Badge implements BadgeContract
{
    /**
     * @var MembersContract
     */
    protected $members;

    /**
     * @var Company
     */
    protected $company;

    /**
     * @var Pdf
     */
    protected $pdf;

    /**
     * @var string
     */
    protected $orientation = 'landscape';

    /**
     * @var boolean
     */
    protected $withBackPage = true;

    /**
     * @var string
     */
    protected $css;

    /**
     * @var string
     */
    protected $view = null;

    /**
     * @var string
     */
    protected $html = '';

    /**
     * @param   Pdf $pdf
     */
    public function __construct(Pdf $pdf) {

        $this->pdf = $pdf;

        $this->pdf->setOptions([
            'margin-left'   => 1,
            'margin-right'  => 1,
            'margin-top'    => 3,
            'margin-bottom' => 3
        ]);
    }

    /**
     * @param   MembersContract  $members
     * @return  $this
     */
    public function setMembers(MembersContract $members)
    {
        $this->members = $members;

        return $this;
    }

    /**
     * @param   Company  $company
     * @return  $this
     */
    public function setCompany(Company $company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * @param   string  $orientation
     * @return  $this
     */
    public function setOrientation(string $orientation)
    {
        $this->orientation = $orientation;

        return $this;
    }

    /**
     * @param   bool  $withBackPage
     * @return  $this
     */
    public function withBackPage(bool $withBackPage)
    {
        $this->withBackPage = $withBackPage;

        return $this;
    }

    /**
     * @param   string  $css
     * @return  $this
     */
    public function loadCSS(string $css)
    {
        $this->css = file_get_contents($css);

        return $this;
    }

    /**
     * @param   string|null $view
     * @return  $this
     * @throws  WrongOrientationException
     */
    public function loadView(string $view = null)
    {
        if($view) {
            $this->view = $view;

            return $this;
        }

        if($this->orientation == 'landscape') {
            $this->view = __DIR__ . '/../resources/views/landscape.phtml';
            $this->loadCSS(__DIR__ . '/../resources/css/landscape.css');

        } elseif($this->orientation == 'portrait') {
            $this->view = __DIR__ . '/../resources/views/portrait.phtml';
            $this->loadCSS(__DIR__ . '/../resources/css/portrait.css');

        } else {
            throw new WrongOrientationException;
        }

        return $this;
    }

    /**
     * @param   bool  $download
     * @param   string  $filename
     * @return  Response
     * @throws  EmptyMembersException
     */
    public function generate($download = false, $filename = 'cartoes.pdf') : Response
    {
        $this->loadView();

        $css            = $this->css;
        $members        = $this->members->retrieve();
        $hasBackPage    = $this->withBackPage;
        $company        = $this->company;

        if($members->isEmpty()) {
            throw new EmptyMembersException;
        }

        $this->html = View::render($this->view, compact('css', 'members', 'hasBackPage', 'company'));

        return $this->toPdf($download, $filename);
    }

    /**
     * @param   bool $download
     * @param   string $filename
     * @return  Response
     */
    public function toPdf($download = false, $filename = 'cartoes.pdf') : Response
    {
        $file = ($download) ? 'attachment' : 'inline';

        return new Response($this->pdf->getOutputFromHtml($this->html), 200, [
            'Content-Type'          => 'application/pdf',
            'Content-Disposition'   => $file . '; filename="'. $file .'"'
        ]);
    }
}