<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* themes/contrib/easy_email_theme/templates/symfony-mailer-lite-email.html.twig */
class __TwigTemplate_84692e36d9529201e8ff141219e871f3 extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'email' => [$this, 'block_email'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 36
        $context["classes"] = [];
        // line 38
        yield from $this->unwrap()->yieldBlock('email', $context, $blocks);
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["is_html", "attributes", "body"]);        yield from [];
    }

    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_email(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 39
        yield "  ";
        if (($context["is_html"] ?? null)) {
            // line 40
            yield "    <!DOCTYPE html>
    <html xml:lang=\"en\" lang=\"en\" xmlns=\"http://www.w3.org/1999/xhtml\" xmlns:v=\"urn:schemas-microsoft-com:vml\" xmlns:o=\"urn:schemas-microsoft-com:office:office\">
    <head>
      <meta http-equiv=\"Content-Type\" content=\"text/html; charset=utf-8\">
      <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
      <meta http-equiv=\"X-UA-Compatible\" content=\"IE=Edge\">
      <meta name=\"format-detection\" content=\"telephone=no, date=no, address=no, email=no\">
      <meta name=\"x-apple-disable-message-reformatting\">
      <meta name=\"color-scheme\" content=\"light dark\">
      <meta name=\"supported-color-schemes\" content=\"light dark only\">
      <!--[if mso]>
      <noscript>
        <xml>
          <o:OfficeDocumentSettings>
            <o:AllowPNG/>
            <o:PixelsPerInch>96</o:PixelsPerInch>
          </o:OfficeDocumentSettings>
        </xml>
      </noscript>
      <![endif]-->
      <!--[if (gte mso 9)|(IE)]>
      <style>
        sup{font-size:100% !important;}
      </style>
      <![endif]-->
    </head>
    <body id=\"body\" bgcolor=\"#ffffff\" style=\"background-color:#ffffff;height: 100% !important;margin: 0 auto !important;padding: 0 !important;width: 100% !important;-webkit-text-size-adjust: 100%;-ms-text-size-adjust: 100%;-webkit-font-smoothing: antialiased;word-spacing: normal;\">
    <div";
            // line 67
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attributes"] ?? null), "html", null, true);
            yield ">
      <table width=\"100%\" cellpadding=\"0\" cellspacing=\"0\" role=\"presentation\">
        <tr>
          <td>
            <div style=\"padding: 0px 0px 0px 0px;\" class=\"clearfix\">
              ";
            // line 72
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["body"] ?? null), "html", null, true);
            yield "
            </div>
          </td>
        </tr>
      </table>
    </div>
    </body>
    </html>
  ";
        } else {
            // line 81
            yield "    ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["body"] ?? null), "html", null, true);
            yield "
  ";
        }
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/easy_email_theme/templates/symfony-mailer-lite-email.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  111 => 81,  99 => 72,  91 => 67,  62 => 40,  59 => 39,  47 => 38,  45 => 36,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/easy_email_theme/templates/symfony-mailer-lite-email.html.twig", "/var/www/html/web/themes/contrib/easy_email_theme/templates/symfony-mailer-lite-email.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 36, "block" => 38, "if" => 39);
        static $filters = array("escape" => 67);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
                ['escape'],
                [],
                $this->source
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
