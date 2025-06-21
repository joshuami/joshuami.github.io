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

/* xtra:navbar-brand */
class __TwigTemplate_e705d7e2b4d4d719f0e11f01a807c01d extends Template
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
            'logo' => [$this, 'block_logo'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.xtra--navbar-brand"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "xtra:navbar-brand"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "xtra:navbar-brand"));
        // line 17
        $macros["navbar_brand"] = $this->macros["navbar_brand"] = $this;
        // line 18
        $context["navbar_brand_utility_classes"] = Twig\Extension\CoreExtension::join(($context["navbar_brand_utility_classes"] ?? null), " ");
        // line 19
        yield "
";
        // line 20
        if ((($tmp = ($context["path"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 21
            yield "  <a href=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["path"] ?? null), "html", null, true);
            yield "\" class=\"navbar-brand ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["navbar_brand_utility_classes"] ?? null), "html", null, true);
            yield "\" ";
            if ((array_key_exists("text", $context) &&  !Twig\Extension\CoreExtension::testEmpty(($context["text"] ?? null)))) {
                yield "aria-label=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["text"] ?? null), "html", null, true);
                yield "\"";
            }
            yield ">
    ";
            // line 22
            yield from $this->unwrap()->yieldBlock('logo', $context, $blocks);
            // line 41
            yield "  </a>
";
        } else {
            // line 43
            yield "  <span class=\"navbar-brand h1 mb-0 ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["navbar_brand_utility_classes"] ?? null), "html", null, true);
            yield "\" ";
            if ((array_key_exists("text", $context) &&  !Twig\Extension\CoreExtension::testEmpty(($context["text"] ?? null)))) {
                yield "aria-label=\"";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["text"] ?? null), "html", null, true);
                yield "\"";
            }
            yield ">
    ";
            // line 44
            if ((($tmp = ($context["image"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 45
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($macros["navbar_brand"]->getTemplateForMacro("macro_image", $context, 45, $this->getSourceContext())->macro_image(...[($context["image"] ?? null), ($context["width"] ?? null), ($context["height"] ?? null), ($context["alt"] ?? null)]));
                yield "
    ";
            }
            // line 47
            yield "
    ";
            // line 48
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["text"] ?? null), "html", null, true);
            yield "
  </span>
";
        }
        // line 51
        yield "
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["_self", "path", "text", "image", "width", "height", "alt", "site_slogan", "src"]);        yield from [];
    }

    // line 22
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_logo(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 23
        yield "      ";
        // line 28
        yield "
      ";
        // line 29
        if ((($context["text"] ?? null) || ($context["site_slogan"] ?? null))) {
            // line 30
            yield "        <div class=\"navbar-brand__text d-flex flex-column\">
          ";
            // line 31
            if ((($tmp = ($context["text"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 32
                yield "            <span class=\"display-4\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["text"] ?? null), "html", null, true);
                yield "</span>
          ";
            }
            // line 34
            yield "
          ";
            // line 35
            if ((($tmp = ($context["site_slogan"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                // line 36
                yield "            <span class=\"small text-muted\">";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["site_slogan"] ?? null), "html", null, true);
                yield "</span>
          ";
            }
            // line 38
            yield "        </div>
      ";
        }
        // line 40
        yield "    ";
        yield from [];
    }

    // line 52
    public function macro_image($src = null, $width = null, $height = null, $alt = null, ...$varargs): string|Markup
    {
        $macros = $this->macros;
        $context = [
            "src" => $src,
            "width" => $width,
            "height" => $height,
            "alt" => $alt,
            "varargs" => $varargs,
        ] + $this->env->getGlobals();

        $blocks = [];

        return ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 53
            yield "  ";
            $context["height_attribute"] = (((($context["height"] ?? null) != "auto")) ? ((("height=\"" . ($context["height"] ?? null)) . "\"")) : (""));
            // line 54
            yield "  <img src=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["src"] ?? null), "html", null, true);
            yield "\" width=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("width", $context)) ? (Twig\Extension\CoreExtension::default(($context["width"] ?? null), 140)) : (140)), "html", null, true);
            yield "\" ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["height_attribute"] ?? null), "html", null, true);
            yield " alt=\"";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ((array_key_exists("alt", $context)) ? (Twig\Extension\CoreExtension::default(($context["alt"] ?? null), "")) : ("")), "html", null, true);
            yield "\" />
";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "xtra:navbar-brand";
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
        return array (  175 => 54,  172 => 53,  157 => 52,  152 => 40,  148 => 38,  142 => 36,  140 => 35,  137 => 34,  131 => 32,  129 => 31,  126 => 30,  124 => 29,  121 => 28,  119 => 23,  112 => 22,  105 => 51,  99 => 48,  96 => 47,  90 => 45,  88 => 44,  77 => 43,  73 => 41,  71 => 22,  58 => 21,  56 => 20,  53 => 19,  51 => 18,  49 => 17,  45 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "xtra:navbar-brand", "themes/custom/xtra/components/navbar-brand/navbar-brand.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["import" => 17, "set" => 18, "if" => 20, "block" => 22, "macro" => 52];
        static $filters = ["join" => 18, "escape" => 21, "default" => 54];
        static $functions = [];

        try {
            $this->sandbox->checkSecurity(
                ['import', 'set', 'if', 'block', 'macro'],
                ['join', 'escape', 'default'],
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
