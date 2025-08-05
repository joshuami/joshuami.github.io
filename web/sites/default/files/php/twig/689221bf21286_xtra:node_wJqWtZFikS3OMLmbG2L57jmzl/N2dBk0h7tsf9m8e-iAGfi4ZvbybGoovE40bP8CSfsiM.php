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

/* xtra:node */
class __TwigTemplate_78dc44339148ab96a847248c081830b9 extends Template
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
            'node_title' => [$this, 'block_node_title'],
            'node_metadata' => [$this, 'block_node_metadata'],
            'node_content' => [$this, 'block_node_content'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.xtra--node"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "xtra:node"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "xtra:node"));
        // line 33
        $_v0 = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 34
            yield "
";
            // line 36
            $context["node_classes"] = Twig\Extension\CoreExtension::merge(["node", (((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 38
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 38)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("node--promoted") : ("")), (((($tmp = CoreExtension::getAttribute($this->env, $this->source,             // line 39
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 39)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("node--sticky") : ("")), (((($tmp =  !CoreExtension::getAttribute($this->env, $this->source,             // line 40
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 40)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("node--unpublished") : ("")), \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,             // line 41
($context["node"] ?? null), "bundle", [], "any", false, false, true, 41)), ((\Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,             // line 42
($context["node"] ?? null), "bundle", [], "any", false, false, true, 42)) . "--") . \Drupal\Component\Utility\Html::getClass(($context["view_mode"] ?? null))), ((("node--" . \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,             // line 43
($context["node"] ?? null), "bundle", [], "any", false, false, true, 43))) . "--") . \Drupal\Component\Utility\Html::getClass(($context["view_mode"] ?? null))), ("view-mode--" . \Drupal\Component\Utility\Html::getClass(            // line 44
($context["view_mode"] ?? null)))], ((            // line 45
($context["node_utility_classes"] ?? null)) ? ($context["node_utility_classes"]) : ([])));
            // line 47
            yield "
";
            // line 49
            $context["author_classes"] = Twig\Extension\CoreExtension::merge(["author"], ((            // line 51
($context["author_utility_classes"] ?? null)) ? ($context["author_utility_classes"]) : ([])));
            // line 53
            yield "
";
            // line 55
            $context["node_content_classes"] = Twig\Extension\CoreExtension::merge(["node-content"], ((            // line 57
($context["node_content_utility_classes"] ?? null)) ? ($context["node_content_utility_classes"]) : ([])));
            // line 59
            yield "
";
            // line 60
            $context["node_attributes"] = ((($context["attributes"] ?? null)) ? ($context["attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
            // line 61
            yield "
<article ";
            // line 62
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["node_attributes"] ?? null), "addClass", [($context["node_classes"] ?? null)], "method", false, false, true, 62), "html", null, true);
            yield ">
  ";
            // line 63
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
            yield "

  ";
            // line 65
            yield from $this->unwrap()->yieldBlock('node_title', $context, $blocks);
            // line 76
            yield "
  ";
            // line 77
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
            yield "

  ";
            // line 79
            yield from $this->unwrap()->yieldBlock('node_metadata', $context, $blocks);
            // line 92
            yield "
  <div ";
            // line 93
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", [($context["node_content_classes"] ?? null)], "method", false, false, true, 93), "html", null, true);
            yield ">
    ";
            // line 94
            yield from $this->unwrap()->yieldBlock('node_content', $context, $blocks);
            // line 97
            yield "  </div>
</article>

";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 33
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::spaceless($_v0));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "view_mode", "node_utility_classes", "author_utility_classes", "node_content_utility_classes", "attributes", "title_prefix", "title_suffix", "content_attributes", "page", "label", "url", "display_submitted", "author_picture", "author_attributes", "author_name", "date", "metadata", "content"]);        yield from [];
    }

    // line 65
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_node_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 66
        yield "    ";
        if ((($tmp =  !($context["page"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 67
            yield "      ";
            // line 68
            yield from $this->load("radix:heading", 68)->unwrap()->yield(CoreExtension::merge($context, ["content" => ((            // line 69
array_key_exists("label", $context)) ? (Twig\Extension\CoreExtension::default(($context["label"] ?? null), "")) : ("")), "heading_html_tag" => "h2", "title_link" =>             // line 71
($context["url"] ?? null)]));
            // line 74
            yield "    ";
        }
        // line 75
        yield "  ";
        yield from [];
    }

    // line 79
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_node_metadata(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 80
        yield "    ";
        if ((($tmp = ($context["display_submitted"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 81
            yield "      <footer>
        ";
            // line 82
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["author_picture"] ?? null), "html", null, true);
            yield "
        <div ";
            // line 83
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["author_attributes"] ?? null), "addClass", [($context["author_classes"] ?? null)], "method", false, false, true, 83), "html", null, true);
            yield ">
          ";
            // line 84
            yield t("Submitted by @author_name on @date", ["@author_name" =>             // line 85
($context["author_name"] ?? null), "@date" => ($context["date"] ?? null), ]);
            // line 87
            yield "          ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["metadata"] ?? null), "html", null, true);
            yield "
        </div>
      </footer>
    ";
        }
        // line 91
        yield "  ";
        yield from [];
    }

    // line 94
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_node_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 95
        yield "      ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true);
        yield "
    ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "xtra:node";
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
        return array (  197 => 95,  190 => 94,  185 => 91,  177 => 87,  175 => 85,  174 => 84,  170 => 83,  166 => 82,  163 => 81,  160 => 80,  153 => 79,  148 => 75,  145 => 74,  143 => 71,  142 => 69,  141 => 68,  139 => 67,  136 => 66,  129 => 65,  123 => 33,  116 => 97,  114 => 94,  110 => 93,  107 => 92,  105 => 79,  100 => 77,  97 => 76,  95 => 65,  90 => 63,  86 => 62,  83 => 61,  81 => 60,  78 => 59,  76 => 57,  75 => 55,  72 => 53,  70 => 51,  69 => 49,  66 => 47,  64 => 45,  63 => 44,  62 => 43,  61 => 42,  60 => 41,  59 => 40,  58 => 39,  57 => 38,  56 => 36,  53 => 34,  51 => 33,  47 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "xtra:node", "themes/custom/xtra/components/node/node.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 33, "set" => 36, "block" => 65, "if" => 66, "include" => 68, "trans" => 84];
        static $filters = ["merge" => 45, "clean_class" => 41, "escape" => 62, "spaceless" => 33, "default" => 69];
        static $functions = ["create_attribute" => 60];

        try {
            $this->sandbox->checkSecurity(
                ['apply', 'set', 'block', 'if', 'include', 'trans'],
                ['merge', 'clean_class', 'escape', 'spaceless', 'default'],
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
