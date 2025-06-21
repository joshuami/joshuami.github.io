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

/* radix:heading */
class __TwigTemplate_836d6dd6fb265350495165d528fe148b extends Template
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
            'heading_content' => [$this, 'block_heading_content'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--heading"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:heading"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:heading"));
        // line 24
        $context["heading_html_tag"] = ((array_key_exists("heading_html_tag", $context)) ? (Twig\Extension\CoreExtension::default(($context["heading_html_tag"] ?? null), "h2")) : ("h2"));
        // line 25
        $context["display"] = (((true &&  !(null === [($context["display"] ?? null)]))) ? ([($context["display"] ?? null)]) : ([]));
        // line 26
        $context["heading_attributes"] = ((($context["heading_attributes"] ?? null)) ? ($context["heading_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 27
        $context["heading_classes"] = Twig\Extension\CoreExtension::merge(($context["display"] ?? null), ((($context["heading_utility_classes"] ?? null)) ? ($context["heading_utility_classes"]) : ([])));
        // line 28
        yield "
";
        // line 29
        if ((($tmp = ($context["title_link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 30
            yield "  ";
            $context["heading_link_attributes"] = CoreExtension::getAttribute($this->env, $this->source, $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute(), "setAttribute", ["href", ($context["title_link"] ?? null)], "method", false, false, true, 30);
            // line 31
            yield "  ";
            $context["heading_link_classes"] = ((($context["heading_link_utility_classes"] ?? null)) ? ($context["heading_link_utility_classes"]) : ([]));
        }
        // line 33
        yield "
";
        // line 34
        if ((($tmp = ($context["content"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 35
            yield "  <";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["heading_html_tag"] ?? null), "html", null, true);
            yield " ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["heading_attributes"] ?? null), "addClass", [($context["heading_classes"] ?? null)], "method", false, false, true, 35), "html", null, true);
            yield ">
    ";
            // line 36
            yield from $this->unwrap()->yieldBlock('heading_content', $context, $blocks);
            // line 45
            yield "  </";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["heading_html_tag"] ?? null), "html", null, true);
            yield ">
";
        }
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["heading_utility_classes", "title_link", "heading_link_utility_classes", "content"]);        yield from [];
    }

    // line 36
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_heading_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 37
        yield "      ";
        if ((($tmp = ($context["title_link"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 38
            yield "        <a ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["heading_link_attributes"] ?? null), "addClass", [($context["heading_link_classes"] ?? null)], "method", false, false, true, 38), "html", null, true);
            yield ">
          ";
            // line 39
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true);
            yield "
        </a>
      ";
        } else {
            // line 42
            yield "        ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["content"] ?? null), "html", null, true);
            yield "
      ";
        }
        // line 44
        yield "    ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:heading";
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
        return array (  120 => 44,  114 => 42,  108 => 39,  103 => 38,  100 => 37,  93 => 36,  83 => 45,  81 => 36,  74 => 35,  72 => 34,  69 => 33,  65 => 31,  62 => 30,  60 => 29,  57 => 28,  55 => 27,  53 => 26,  51 => 25,  49 => 24,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:heading", "themes/contrib/radix/components/heading/heading.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 24, "if" => 29, "block" => 36];
        static $filters = ["default" => 24, "merge" => 27, "escape" => 35];
        static $functions = ["create_attribute" => 26];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if', 'block'],
                ['default', 'merge', 'escape'],
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
