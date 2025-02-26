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

/* xtra:image */
class __TwigTemplate_a0d161fb230c9b7fd19ec3aab16fcb22 extends Template
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
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.xtra--image"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "xtra:image"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "xtra:image"));
        // line 23
        $_v0 = ('' === $tmp = \Twig\Extension\CoreExtension::captureOutput((function () use (&$context, $macros, $blocks) {
            // line 24
            yield "
";
            // line 25
            $context["fallback_attributes"] = $this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute();
            // line 26
            $context["fallback_attributes"] = CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, CoreExtension::getAttribute($this->env, $this->source, ($context["fallback_attributes"] ?? null), "setAttribute", ["src", ((            // line 27
($context["src"] ?? null)) ? ($context["src"]) : (""))], "method", false, false, true, 26), "setAttribute", ["alt", ((            // line 28
($context["alt"] ?? null)) ? ($context["alt"]) : (""))], "method", false, false, true, 27), "setAttribute", ["title", ((            // line 29
($context["title"] ?? null)) ? ($context["title"]) : (""))], "method", false, false, true, 28), "setAttribute", ["width", ((            // line 30
($context["width"] ?? null)) ? ($context["width"]) : (""))], "method", false, false, true, 29), "setAttribute", ["height", ((            // line 31
($context["height"] ?? null)) ? ($context["height"]) : (""))], "method", false, false, true, 30), "setAttribute", ["loading", ((            // line 32
($context["loading"] ?? null)) ? ($context["loading"]) : ("auto"))], "method", false, false, true, 31);
            // line 34
            yield "
";
            // line 35
            $context["image_attributes"] = CoreExtension::getAttribute($this->env, $this->source, ($context["fallback_attributes"] ?? null), "merge", [((($context["attributes"] ?? null)) ? ($context["attributes"]) : ([]))], "method", false, false, true, 35);
            // line 36
            if ((($context["style_name"] ?? null) == "profile_round")) {
                // line 37
                yield "  ";
                $context["rounded"] = true;
            }
            // line 39
            yield "
";
            // line 41
            $context["align_classes"] = ["start" => ["float-start"], "center" => ["mx-auto", "d-block"], "end" => ["float-end"]];
            // line 47
            yield "
";
            // line 48
            $context["image_classes"] = Twig\Extension\CoreExtension::merge([((            // line 49
($context["align"] ?? null)) ? (Twig\Extension\CoreExtension::join((($_v1 = ($context["align_classes"] ?? null)) && is_array($_v1) || $_v1 instanceof ArrayAccess && in_array($_v1::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v1[($context["align"] ?? null)] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["align_classes"] ?? null), ($context["align"] ?? null), [], "array", false, false, true, 49)), " ")) : ("")), ((            // line 50
($context["responsive"] ?? null)) ? ("img-fluid") : ("")), ((            // line 51
($context["thumbnails"] ?? null)) ? ("img-thumbnail") : ("")), ((            // line 52
($context["rounded"] ?? null)) ? ("rounded-circle") : (""))], ((            // line 53
($context["image_utility_classes"] ?? null)) ? ($context["image_utility_classes"]) : ([])));
            // line 55
            yield "
<img ";
            // line 56
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["image_attributes"] ?? null), "addClass", [($context["image_classes"] ?? null)], "method", false, false, true, 56), "html", null, true);
            yield " />

";
            yield from [];
        })())) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 23
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(Twig\Extension\CoreExtension::spaceless($_v0));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["src", "alt", "title", "width", "height", "loading", "attributes", "style_name", "align", "responsive", "thumbnails", "image_utility_classes"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "xtra:image";
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
        return array (  99 => 23,  92 => 56,  89 => 55,  87 => 53,  86 => 52,  85 => 51,  84 => 50,  83 => 49,  82 => 48,  79 => 47,  77 => 41,  74 => 39,  70 => 37,  68 => 36,  66 => 35,  63 => 34,  61 => 32,  60 => 31,  59 => 30,  58 => 29,  57 => 28,  56 => 27,  55 => 26,  53 => 25,  50 => 24,  48 => 23,  44 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "xtra:image", "themes/custom/xtra/components/image/image.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["apply" => 23, "set" => 25, "if" => 36];
        static $filters = ["merge" => 53, "join" => 49, "escape" => 56, "spaceless" => 23];
        static $functions = ["create_attribute" => 25];

        try {
            $this->sandbox->checkSecurity(
                ['apply', 'set', 'if'],
                ['merge', 'join', 'escape', 'spaceless'],
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
