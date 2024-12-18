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

/* themes/contrib/gin/templates/node/node-edit-form.html.twig */
class __TwigTemplate_9db56870c522c826342999c7bd3644f9 extends Template
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
            'main' => [$this, 'block_main'],
            'secondary' => [$this, 'block_secondary'],
            'footer' => [$this, 'block_footer'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 18
        if (CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "is_ajax_request", [], "any", false, false, true, 18)) {
            // line 19
            yield "  ";
            yield from $this->unwrap()->yieldBlock('main', $context, $blocks);
            // line 22
            yield "
  ";
            // line 23
            yield from $this->unwrap()->yieldBlock('secondary', $context, $blocks);
            // line 26
            yield "
  ";
            // line 27
            yield from $this->unwrap()->yieldBlock('footer', $context, $blocks);
        } else {
            // line 32
            yield "  <div class=\"layout-node-form clearfix\">
    <div class=\"layout-region layout-region-node-main\">
      ";
            // line 34
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["form"] ?? null), "advanced", "footer", "gin_actions", "gin_sidebar", "gin_sidebar_toggle"), "html", null, true);
            yield "
    </div>
    <div class=\"layout-region layout-region-node-secondary\" id=\"gin_sidebar\" tabindex=\"0\">
      <span class=\"gin-sidebar-draggable\" id=\"gin-sidebar-draggable\"></span>
      <div class=\"layout-region__content\">
        ";
            // line 39
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "advanced", [], "any", false, false, true, 39), "html", null, true);
            yield "
        ";
            // line 40
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "gin_sidebar_toggle", [], "any", false, false, true, 40), "html", null, true);
            yield "
      </div>
    </div>
  </div>
  ";
            // line 44
            if ((($context["gin_layout_paragraphs"] ?? null) == 1)) {
                // line 45
                yield "    <style>
      .layout-node-form {
        --gin-lp-layout: \"";
                // line 47
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Layout"));
                yield "\";
        --gin-lp-content: \"";
                // line 48
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(t("Content"));
                yield "\";
      }
    </style>
  ";
            }
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["form", "gin_layout_paragraphs"]);        yield from [];
    }

    // line 19
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_main(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 20
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["form"] ?? null), "advanced", "footer", "actions"), "html", null, true);
        yield "
  ";
        yield from [];
    }

    // line 23
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_secondary(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 24
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "advanced", [], "any", false, false, true, 24), "html", null, true);
        yield "
  ";
        yield from [];
    }

    // line 27
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 28
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "footer", [], "any", false, false, true, 28), "html", null, true);
        yield "
    ";
        // line 29
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["form"] ?? null), "actions", [], "any", false, false, true, 29), "html", null, true);
        yield "
  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/contrib/gin/templates/node/node-edit-form.html.twig";
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
        return array (  150 => 29,  145 => 28,  138 => 27,  130 => 24,  123 => 23,  115 => 20,  108 => 19,  96 => 48,  92 => 47,  88 => 45,  86 => 44,  79 => 40,  75 => 39,  67 => 34,  63 => 32,  60 => 27,  57 => 26,  55 => 23,  52 => 22,  49 => 19,  47 => 18,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/contrib/gin/templates/node/node-edit-form.html.twig", "/var/www/html/web/themes/contrib/gin/templates/node/node-edit-form.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 18, "block" => 19);
        static $filters = array("escape" => 34, "without" => 34, "t" => 47);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['if', 'block'],
                ['escape', 'without', 't'],
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
