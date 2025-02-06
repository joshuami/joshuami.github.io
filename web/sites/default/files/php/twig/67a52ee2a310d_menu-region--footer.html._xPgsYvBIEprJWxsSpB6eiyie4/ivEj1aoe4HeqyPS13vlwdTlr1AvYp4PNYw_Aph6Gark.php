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

/* core/modules/navigation/templates/menu-region--footer.html.twig */
class __TwigTemplate_52c04ef74dd03a92b752953e47d7eb46 extends Template
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
        // line 24
        yield "<div class=\"admin-toolbar__item\">
  ";
        // line 26
        yield "  <h4 class=\"visually-hidden focusable\">";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
        yield "</h4>
  <ul class=\"toolbar-block__list\">
    <li id=\"admin-toolbar-user-menu\" class=\"toolbar-block__list-item toolbar-block__list-item--user toolbar-popover\" data-toolbar-popover>
      ";
        // line 29
        yield from $this->loadTemplate("navigation:toolbar-button", "core/modules/navigation/templates/menu-region--footer.html.twig", 29)->unwrap()->yield(CoreExtension::toArray(["action" => t("Extend"), "attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["aria-expanded" => "false", "aria-controls" => "admin-toolbar-user-menu", "data-toolbar-popover-control" => true, "data-has-safe-triangle" => true]), "icon" => \Drupal\Component\Utility\Html::getClass(        // line 37
($context["menu_name"] ?? null)), "text" =>         // line 38
($context["title"] ?? null), "modifiers" => ["expand--side", "collapsible"], "extra_classes" => ["toolbar-popover__control"]]));
        // line 47
        yield "      <div class=\"toolbar-popover__wrapper\" data-toolbar-popover-wrapper>
        ";
        // line 48
        yield from $this->loadTemplate("navigation:toolbar-button", "core/modules/navigation/templates/menu-region--footer.html.twig", 48)->unwrap()->yield(CoreExtension::toArray(["attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(), "modifiers" => ["large", "dark", "non-interactive"], "extra_classes" => ["toolbar-popover__header"], "html_tag" => "span", "text" =>         // line 59
($context["title"] ?? null)]));
        // line 61
        yield "        <ul class=\"toolbar-menu toolbar-popover__menu\">
          ";
        // line 62
        $context['_parent'] = $context;
        $context['_seq'] = CoreExtension::ensureTraversable(($context["items"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["item"]) {
            // line 63
            yield "            <li class=\"toolbar-menu__item toolbar-menu__item--level-1\">
              ";
            // line 64
            yield from $this->loadTemplate("navigation:toolbar-button", "core/modules/navigation/templates/menu-region--footer.html.twig", 64)->unwrap()->yield(CoreExtension::toArray(["attributes" => $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(["href" => $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source,             // line 65
$context["item"], "url", [], "any", false, false, true, 65))]), "html_tag" => "a", "text" => CoreExtension::getAttribute($this->env, $this->source,             // line 67
$context["item"], "title", [], "any", false, false, true, 67)]));
            // line 69
            yield "            </li>
          ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_key'], $context['item'], $context['_parent']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 71
        yield "        </ul>
      </div>
    </li>
  </ul>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["title", "menu_name", "items"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "core/modules/navigation/templates/menu-region--footer.html.twig";
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
        return array (  85 => 71,  78 => 69,  76 => 67,  75 => 65,  74 => 64,  71 => 63,  67 => 62,  64 => 61,  62 => 59,  61 => 48,  58 => 47,  56 => 38,  55 => 37,  54 => 29,  47 => 26,  44 => 24,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "core/modules/navigation/templates/menu-region--footer.html.twig", "/var/www/html/web/core/modules/navigation/templates/menu-region--footer.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["include" => 29, "for" => 62];
        static $filters = ["escape" => 26, "t" => 30, "clean_class" => 37, "render" => 65];
        static $functions = ["create_attribute" => 31];

        try {
            $this->sandbox->checkSecurity(
                ['include', 'for'],
                ['escape', 't', 'clean_class', 'render'],
                ['create_attribute'],
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
