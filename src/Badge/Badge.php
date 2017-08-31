<?php

    namespace Igrejanet\Badges\Badge;


    use Igrejanet\Badges\Contracts\BadgeContract;
    use Igrejanet\Badges\Contracts\MembersContract;
    use Igrejanet\Badges\Exceptions\EmptyMembersException;
    use Igrejanet\Badges\Exceptions\WrongOrientationException;
    use Igrejanet\Badges\Person\Company;
    use Igrejanet\Badges\View;
    use Illuminate\Http\Response;
    use Knp\Snappy\Pdf;

    /**
     * Badge
     *
     * @author  Matheus Lopes Santos <fale_com_lopez@hotmail.com>
     * @version 2.0.0
     * @since   29/08/2017
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
         * @var string
         */
        protected $orientation;

        /**
         * @var boolean
         */
        protected $withBackPage;

        /**
         * @var Pdf
         */
        protected $pdf;

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
         * @param   MembersContract $members
         * @param   Company  $company
         * @param   Pdf $pdf
         * @param   string $orientation
         * @param   bool $withBackPage
         */
        public function __construct(
            MembersContract $members,
            Company $company,
            Pdf $pdf,
            $orientation = 'landscape',
            $withBackPage = true
        ) {
            $this->members      = $members;
            $this->company      = $company;
            $this->pdf          = $pdf;
            $this->orientation  = $orientation;
            $this->withBackPage = $withBackPage;
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
                $this->view = __DIR__ . '/../../resources/views/landscape.phtml';
                $this->loadCSS(__DIR__ . '/../../resources/css/landscape.css');

            } elseif($this->orientation == 'portrait') {
                $this->view = __DIR__ . '/../../resources/views/portrait.phtml';
                $this->loadCSS(__DIR__ . '/../../resources/css/portrait.css');

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

            return $this->toPdf();
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