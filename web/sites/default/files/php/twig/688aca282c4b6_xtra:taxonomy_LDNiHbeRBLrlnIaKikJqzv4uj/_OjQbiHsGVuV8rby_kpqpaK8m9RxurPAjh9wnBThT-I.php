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

/* xtra:taxonomy */
class __TwigTemplate_f7f2ad284701a0d6c6958cd107022c67 extends Template
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
            'taxonomy_title_prefix' => [$this, 'block_taxonomy_title_prefix'],
            'taxonomy_title' => [$this, 'block_taxonomy_title'],
            'taxonomy_title_suffix' => [$this, 'block_taxonomy_title_suffix'],
            'taxonomy_content' => [$this, 'block_taxonomy_content'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.xtra--taxonomy"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "xtra:taxonomy"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "xtra:taxonomy"));
        // line 28
        $_v0 = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 29
            yield "
";
            // line 31
            $context["taxonomy_classes"] = Twig\Extension\CoreExtension::merge(["taxonomy", (((($tmp =  !CoreExtension::getAttribute($this->env, $this->source,             // line 33
($context["term"] ?? null), "isPublished", [], "method", false, false, true, 33)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("term--unpublished") : ("")), \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,             // line 34
($context["term"] ?? null), "bundle", [], "any", false, false, true, 34)), ((\Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,             // line 35
($context["term"] ?? null), "bundle", [], "any", false, false, true, 35)) . "--") . \Drupal\Component\Utility\Html::getClass(($context["view_mode"] ?? null))), ("term--" . \Drupal\Component\Utility\Html::getClass(            // line 36
($context["view_mode"] ?? null))), ((("term--" . \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,             // line 37
($context["term"] ?? null), "bundle", [], "any", false, false, true, 37))) . "--") . \Drupal\Component\Utility\Html::getClass(($context["view_mode"] ?? null))), ("view-mode--" . \Drupal\Component\Utility\Html::getClass(            // line 38
($context["view_mode"] ?? null)))], ((            // line 39
($context["taxonomy_utility_classes"] ?? null)) ? ($context["taxonomy_utility_classes"]) : ([])));
            // line 41
            yield "
";
            // line 43
            $context["taxonomy_content_classes"] = Twig\Extension\CoreExtension::merge(["taxonomy__content"], ((            // line 45
($context["taxonomy_content_utility_classes"] ?? null)) ? ($context["taxonomy_content_utility_classes"]) : ([])));
            // line 47
            yield "
";
            // line 48
            $context["taxonomy_attributes"] = ((($context["attributes"] ?? null)) ? ($context["attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
            // line 49
            $context["taxonomy_content_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
            // line 50
            yield "
<article ";
            // line 51
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["taxonomy_attributes"] ?? null), "addClass", [($context["taxonomy_classes"] ?? null)], "method", false, false, true, 51), "html", null, true);
            yield ">
  ";
            // line 52
            yield from $this->unwrap()->yieldBlock('taxonomy_title_prefix', $context, $blocks);
            // line 55
            yield "
  ";
            // line 56
            yield from $this->unwrap()->yieldBlock('taxonomy_title', $context, $blocks);
            // line 68
            yield "
  ";
            // line 69
            yield from $this->unwrap()->yieldBlock('taxonomy_title_suffix', $context, $blocks);
            // line 72
            yield "  
  ";
            // line 73
            yield from $this->unwrap()->yieldBlock('taxonomy_content', $context, $blocks);
            // line 80
            yield "</article>

";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 28
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::spaceless($_v0));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["term", "view_mode", "taxonomy_utility_classes", "taxonomy_content_utility_classes", "attributes", "title_prefix", "name", "page", "heading_html_tag", "title_link", "url", "title_attributes", "title_suffix", "content"]);        yield from [];
    }

    // line 52
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_taxonomy_title_prefix(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 53
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
  ";
        yield from [];
    }

    // line 56
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_taxonomy_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 57
        yield "    ";
        if ((($context["name"] ?? null) &&  !($context["page"] ?? null))) {
            // line 58
            yield "      ";
            // line 59
            yield from $this->load("radix:heading", 59)->unwrap()->yield(CoreExtension::merge($context, ["content" => ((            // line 60
array_key_exists("name", $context)) ? (Twig\Extension\CoreExtension::default(($context["name"] ?? null), "")) : ("")), "heading_html_tag" => ((            // line 61
array_key_exists("heading_html_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["heading_html_tag"] ?? null), "h2")) : ("h2")), "title_link" => ((            // line 62
array_key_exists("title_link", $context)) ? (Twig\Extension\CoreExtension::default(($context["title_link"] ?? null), ($context["url"] ?? null))) : (($context["url"] ?? null))), "heading_attributes" =>             // line 63
($context["title_attributes"] ?? null)]));
            // line 66
            yield "    ";
        }
        // line 67
        yield "  ";
        yield from [];
    }

    // line 69
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_taxonomy_title_suffix(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 70
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "
  ";
        yield from [];
    }

    // line 73
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_taxonomy_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 74
        yield "    ";
        if ((($tmp = $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(($context["content"] ?? null))) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 75
            yield "      <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["taxonomy_content_attributes"] ?? null), "addClass", [($context["taxonomy_content_classes"] ?? null)], "method", false, false, true, 75), "html", null, true);
            yield ">
        ";
            // line 76
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true);
            yield "
      </div>
    ";
        }
        // line 79
        yield "  ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "xtra:taxonomy";
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
        return array (  192 => 79,  186 => 76,  181 => 75,  178 => 74,  171 => 73,  163 => 70,  156 => 69,  151 => 67,  148 => 66,  146 => 63,  145 => 62,  144 => 61,  143 => 60,  142 => 59,  140 => 58,  137 => 57,  130 => 56,  122 => 53,  115 => 52,  109 => 28,  103 => 80,  101 => 73,  98 => 72,  96 => 69,  93 => 68,  91 => 56,  88 => 55,  86 => 52,  82 => 51,  79 => 50,  77 => 49,  75 => 48,  72 => 47,  70 => 45,  69 => 43,  66 => 41,  64 => 39,  63 => 38,  62 => 37,  61 => 36,  60 => 35,  59 => 34,  58 => 33,  57 => 31,  54 => 29,  52 => 28,  48 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "xtra:taxonomy", "themes/custom/xtra/components/taxonomy/taxonomy.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 28, "set" => 31, "block" => 52, "if" => 57, "include" => 59];
        static $filters = ["merge" => 39, "clean_class" => 34, "escape" => 51, "spaceless" => 28, "default" => 60, "render" => 74];
        static $functions = ["create_attribute" => 48];

        try {
            $this->sandbox->checkSecurity(
                ['apply', 'set', 'block', 'if', 'include'],
                ['merge', 'clean_class', 'escape', 'spaceless', 'default', 'render'],
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
