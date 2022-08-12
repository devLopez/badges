<?php

namespace Igrejanet\Badges;

use Igrejanet\Badges\Contracts\BadgeContract;
use Igrejanet\Badges\Contracts\MembersContract;
use Igrejanet\Badges\Exceptions\EmptyMembersException;
use Igrejanet\Badges\Exceptions\WrongOrientationException;
use Igrejanet\Badges\Person\Company;
use Illuminate\Http\Response;
use Knp\Snappy\Pdf;

class Badge implements BadgeContract
{
    protected MembersContract $members;

    protected Company $company;

    protected string $orientation = 'landscape';

    protected bool $withBackPage = true;

    protected string $css;

    protected ?string $view = null;

    protected string $html = '';

    public function __construct(protected Pdf $pdf)
    {
        $this->pdf->setOptions([
            'margin-left'   => 1,
            'margin-right'  => 1,
            'margin-top'    => 3,
            'margin-bottom' => 3
        ]);
    }

    public function setMembers(MembersContract $members): static
    {
        $this->members = $members;

        return $this;
    }

    public function setCompany(Company $company): static
    {
        $this->company = $company;

        return $this;
    }

    public function setOrientation(string $orientation): static
    {
        $this->orientation = $orientation;

        return $this;
    }

    public function withBackPage(bool $withBackPage): static
    {
        $this->withBackPage = $withBackPage;

        return $this;
    }

    public function loadCSS(string $css): static
    {
        $this->css = file_get_contents($css);

        return $this;
    }

    public function loadView(string $view = null): static
    {
        if (!in_array($this->orientation, ['landscape', 'portrait'])) {
            throw new WrongOrientationException();
        }

        if ($view) {
            $this->view = $view;

            return $this;
        }

        $orientation = $this->orientation;

        $this->view = __DIR__ . "/../resources/views/{$orientation}.phtml";
        $this->loadCSS(__DIR__ . "/../resources/css/{$orientation}.css");

        return $this;
    }

    public function generate(bool $download = false, string $filename = 'cartoes.pdf'): Response
    {
        if ($this->members->retrieve()->isEmpty()) {
            throw new EmptyMembersException();
        }

        $this->loadView();

        $css         = $this->css;
        $members     = $this->members->retrieve();
        $hasBackPage = $this->withBackPage;
        $company     = $this->company;

        $this->html = View::render($this->view, compact('css', 'members', 'hasBackPage', 'company'));

        return $this->toPdf($download, $filename);
    }

    public function toPdf(bool $download = false, string $filename = 'cartoes.pdf'): Response
    {
        $file = ($download) ? 'attachment' : 'inline';

        return new Response($this->pdf->getOutputFromHtml($this->html), 200, [
            'Content-Type'        => 'application/pdf',
            'Content-Disposition' => $file . '; filename="' . $file . '"'
        ]);
    }
}
