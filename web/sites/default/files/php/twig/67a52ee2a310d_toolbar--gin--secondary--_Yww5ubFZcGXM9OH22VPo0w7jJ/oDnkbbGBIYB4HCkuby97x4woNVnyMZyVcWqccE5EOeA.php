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

/* @gin_toolbar/toolbar--gin--secondary--frontend.html.twig */
class __TwigTemplate_5b923d969a5f6bb9496c39d208f9a919 extends Template
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
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<div class=\"gin-secondary-toolbar gin-secondary-toolbar--frontend\" data-offset-top>
  <div class=\"gin-secondary-toolbar__layout-container\">
    <div class=\"gin-breadcrumb-wrapper\">
      <div class=\"region-breadcrumb\">
        <nav class=\"gin-breadcrumb\" role=\"navigation\" aria-labelledby=\"gin-system-breadcrumb\">
          <h2 id=\"gin-system-breadcrumb\" class=\"visually-hidden\">";
        // line 6
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Breadcrumb"));
        yield "</h2>
          <ol class=\"gin-breadcrumb__list\">
            <li class=\"gin-breadcrumb__item\">
              ";
        // line 9
        if ((($context["entity_edit_url"] ?? null) && ($context["entity_title"] ?? null))) {
            // line 10
            yield "                <a class=\"gin-breadcrumb__link gin-back-to-admin\" href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["entity_edit_url"] ?? null), "html", null, true);
            yield "\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Edit %title", ["%title" => ($context["entity_title"] ?? null)]));
            yield "</a>
              ";
        } else {
            // line 12
            yield "                <a class=\"gin-breadcrumb__link gin-back-to-admin\" href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->getPath("system.admin_content"));
            yield "\">";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Back to Administration"));
            yield "</a>
              ";
        }
        // line 14
        yield "            </li>
          </ol>
        </nav>
      </div>
    </div>
    ";
        // line 19
        if (($context["core_navigation"] ?? null)) {
            // line 20
            yield "      ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["gin_secondary_toolbar"] ?? null), "html", null, true);
            yield "
    ";
        } else {
            // line 22
            yield "      ";
            try {
                $_v0 = $this->loadTemplate("@gin/navigation/toolbar--gin--secondary.html.twig", "@gin_toolbar/toolbar--gin--secondary--frontend.html.twig", 22);
            } catch (LoaderError $e) {
                // ignore missing template
                $_v0 = null;
            }
            if ($_v0) {
                yield from $_v0->unwrap()->yield($context);
            }
            // line 23
            yield "    ";
        }
        // line 24
        yield "  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["entity_edit_url", "entity_title", "core_navigation", "gin_secondary_toolbar"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "@gin_toolbar/toolbar--gin--secondary--frontend.html.twig";
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
        return array (  104 => 24,  101 => 23,  90 => 22,  84 => 20,  82 => 19,  75 => 14,  67 => 12,  59 => 10,  57 => 9,  51 => 6,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "@gin_toolbar/toolbar--gin--secondary--frontend.html.twig", "/var/www/html/web/modules/contrib/gin_toolbar/templates/toolbar--gin--secondary--frontend.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["if" => 9, "include" => 22];
        static $filters = ["t" => 6, "escape" => 10];
        static $functions = ["path" => 12];

        try {
            $this->sandbox->checkSecurity(
                ['if', 'include'],
                ['t', 'escape'],
                ['path'],
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
