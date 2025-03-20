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

/* xtra:block */
class __TwigTemplate_d4468fbdde848a943e9ffc4525e3dfb5 extends Template
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
            'block_label' => [$this, 'block_block_label'],
            'block_content' => [$this, 'block_block_content'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.xtra--block"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "xtra:block"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "xtra:block"));
        // line 33
        $_v0 = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 34
            yield "
";
            // line 35
            $context["block_attributes"] = ((($context["attributes"] ?? null)) ? ($context["attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
            // line 36
            $context["block_html_tag"] = (((array_key_exists("block_html_tag", $context) &&  !(null === $context["block_html_tag"]))) ? ($context["block_html_tag"]) : ("div"));
            // line 37
            yield "
";
            // line 39
            $context["block_classes"] = Twig\Extension\CoreExtension::merge(["block", ("block-" . \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,             // line 41
($context["configuration"] ?? null), "provider", [], "any", false, false, true, 41))), ("block-" . \Drupal\Component\Utility\Html::getClass(            // line 42
($context["plugin_id"] ?? null))), ((            // line 43
($context["layout"] ?? null)) ? (("layout--" . \Drupal\Component\Utility\Html::getClass(($context["layout"] ?? null)))) : ("")), ((            // line 44
($context["bundle"] ?? null)) ? (("block--" . \Drupal\Component\Utility\Html::getClass(($context["bundle"] ?? null)))) : ("")), ((            // line 45
($context["id"] ?? null)) ? (("block--" . \Drupal\Component\Utility\Html::getClass(Twig\Extension\CoreExtension::replace(($context["id"] ?? null), ["_" => "-"])))) : (""))], ((            // line 46
($context["block_utility_classes"] ?? null)) ? ($context["block_utility_classes"]) : ([])));
            // line 48
            yield "
";
            // line 50
            $context["block_content_classes"] = Twig\Extension\CoreExtension::merge(["block__content"], ((            // line 52
($context["block_content_utility_classes"] ?? null)) ? ($context["block_content_utility_classes"]) : ([])));
            // line 54
            yield "
";
            // line 55
            if (($context["block_html_tag"] ?? null)) {
                // line 56
                yield "<";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["block_html_tag"] ?? null), "html", null, true);
                yield " ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["block_attributes"] ?? null), "id"), "addClass", [($context["block_classes"] ?? null)], "method", false, false, true, 56), "html", null, true);
                yield ">
";
            }
            // line 58
            yield "
  ";
            // line 59
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
            yield "
  ";
            // line 60
            yield from $this->unwrap()->yieldBlock('block_label', $context, $blocks);
            // line 72
            yield "  ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
            yield "

  ";
            // line 74
            yield from $this->unwrap()->yieldBlock('block_content', $context, $blocks);
            // line 81
            yield "
";
            // line 82
            if (($context["block_html_tag"] ?? null)) {
                // line 83
                yield "</";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["block_html_tag"] ?? null), "html", null, true);
                yield ">
";
            }
            // line 85
            yield "
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 33
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::spaceless($_v0));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "configuration", "plugin_id", "layout", "bundle", "id", "block_utility_classes", "block_content_utility_classes", "title_prefix", "title_suffix", "label", "title_attributes", "heading_html_tag", "heading_utility_classes", "content", "content_attributes"]);        yield from [];
    }

    // line 60
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_block_label(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 61
        yield "    ";
        if (($context["label"] ?? null)) {
            // line 62
            yield "      ";
            // line 63
            yield from $this->loadTemplate("radix:heading", "xtra:block", 63)->unwrap()->yield(CoreExtension::merge($context, ["heading_attributes" =>             // line 64
($context["title_attributes"] ?? null), "content" =>             // line 65
($context["label"] ?? null), "heading_html_tag" => ((            // line 66
array_key_exists("heading_html_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["heading_html_tag"] ?? null), "h2")) : ("h2")), "heading_utility_classes" => ((            // line 67
array_key_exists("heading_utility_classes", $context)) ? (Twig\Extension\CoreExtension::default(($context["heading_utility_classes"] ?? null), ["block__title"])) : (["block__title"]))]));
            // line 70
            yield "    ";
        }
        // line 71
        yield "  ";
        yield from [];
    }

    // line 74
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 75
        yield "    ";
        if (($context["content"] ?? null)) {
            // line 76
            yield "      <div";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [($context["block_content_classes"] ?? null)], "method", false, false, true, 76), "html", null, true);
            yield ">
        ";
            // line 77
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 80
        yield "  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "xtra:block";
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
        return array (  175 => 80,  169 => 77,  164 => 76,  161 => 75,  154 => 74,  149 => 71,  146 => 70,  144 => 67,  143 => 66,  142 => 65,  141 => 64,  140 => 63,  138 => 62,  135 => 61,  128 => 60,  122 => 33,  117 => 85,  111 => 83,  109 => 82,  106 => 81,  104 => 74,  98 => 72,  96 => 60,  92 => 59,  89 => 58,  81 => 56,  79 => 55,  76 => 54,  74 => 52,  73 => 50,  70 => 48,  68 => 46,  67 => 45,  66 => 44,  65 => 43,  64 => 42,  63 => 41,  62 => 39,  59 => 37,  57 => 36,  55 => 35,  52 => 34,  50 => 33,  46 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "xtra:block", "themes/custom/xtra/components/block/block.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 33, "set" => 35, "if" => 55, "block" => 60, "include" => 63];
        static $filters = ["merge" => 46, "clean_class" => 41, "replace" => 45, "escape" => 56, "without" => 56, "spaceless" => 33, "default" => 66];
        static $functions = ["create_attribute" => 35];

        try {
            $this->sandbox->checkSecurity(
                ['apply', 'set', 'if', 'block', 'include'],
                ['merge', 'clean_class', 'replace', 'escape', 'without', 'spaceless', 'default'],
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
