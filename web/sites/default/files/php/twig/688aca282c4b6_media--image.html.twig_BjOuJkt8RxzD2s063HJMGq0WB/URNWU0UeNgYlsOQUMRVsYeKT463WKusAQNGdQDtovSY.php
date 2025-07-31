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

/* themes/custom/xtra/templates/media/media--image.html.twig */
class __TwigTemplate_c1823342c77b816507947427a4b60d4a extends Template
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
        // line 2
        $context["classes"] = ["media", ("media--type-" . \Drupal\Component\Utility\Html::getClass(CoreExtension::getAttribute($this->env, $this->source,         // line 4
($context["media"] ?? null), "bundle", [], "method", false, false, true, 4))), (((($tmp =  !CoreExtension::getAttribute($this->env, $this->source,         // line 5
($context["media"] ?? null), "isPublished", [], "method", false, false, true, 5)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? ("media--unpublished") : ("")), (((($tmp =         // line 6
($context["view_mode"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) ? (("media--view-mode-" . \Drupal\Component\Utility\Html::getClass(($context["view_mode"] ?? null)))) : (""))];
        // line 9
        yield "<div";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 9), "html", null, true);
        yield ">
  ";
        // line 10
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["title_suffix"] ?? null), "contextual_links", [], "any", false, false, true, 10), "html", null, true);
        yield "
  ";
        // line 11
        if ((($tmp = ($context["content"] ?? null)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
            // line 12
            yield "    ";
            // line 13
            if (((((($context["view_mode"] ?? null) != "release") && (($context["view_mode"] ?? null) != "image_gallery_thumbnail")) && (($context["view_mode"] ?? null) != "output_url")) && (CoreExtension::getAttribute($this->env, $this->source, ($context["media"] ?? null), "id", [], "any", false, false, true, 13) != 21))) {
                // line 14
                yield "      ";
                if ((((($_v0 = ($context["attributes"] ?? null)) && is_array($_v0) || $_v0 instanceof ArrayAccess && in_array($_v0::class, CoreExtension::ARRAY_LIKE_CLASSES, true) ? ($_v0["data-fullsize"] ?? null) : CoreExtension::getAttribute($this->env, $this->source, ($context["attributes"] ?? null), "data-fullsize", [], "array", false, false, true, 14)) == "1") || (Twig\Extension\CoreExtension::trim(Twig\Extension\CoreExtension::striptags($this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(CoreExtension::getAttribute($this->env, $this->source, ($context["content"] ?? null), "field_link_to_fullsize", [], "any", false, false, true, 14)))) == "On"))) {
                    // line 15
                    yield "        <a title=\"View full sized image.\" class=\"position-relative img-fullsize d-block border border-2 border-primary p-1\" href=\"";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.media.canonical", ["media" => CoreExtension::getAttribute($this->env, $this->source, ($context["media"] ?? null), "id", [], "any", false, false, true, 15)]), "html", null, true);
                    yield "\">
          <div class=\"fs-icon\"><i class=\"fal fa-arrow-up-right-and-arrow-down-left-from-center\"></i></div>
          ";
                    // line 17
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_link_to_fullsize"), "html", null, true);
                    yield "
        </a>
      ";
                } else {
                    // line 20
                    yield "        ";
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_link_to_fullsize"), "html", null, true);
                    yield "
      ";
                }
                // line 22
                yield "      ";
                if ((($tmp = CoreExtension::getAttribute($this->env, $this->source, ($context["user"] ?? null), "hasPermission", ["edit any image media"], "method", false, false, true, 22)) && $tmp instanceof Markup ? (string) $tmp : $tmp)) {
                    // line 23
                    yield "        <div class=\"media-edit small m-1\">
          <a href=\"";
                    // line 24
                    yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->getPath("entity.media.canonical", ["media" => CoreExtension::getAttribute($this->env, $this->source, ($context["media"] ?? null), "id", [], "any", false, false, true, 24)]), "html", null, true);
                    yield "/edit\" target=\"_blank\">Edit</a>
        </div>
      ";
                }
                // line 27
                yield "    ";
            } else {
                // line 28
                yield "      ";
                yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter(($context["content"] ?? null), "field_link_to_fullsize"), "html", null, true);
                yield "
    ";
            }
            // line 30
            yield "  ";
        }
        // line 31
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["media", "view_mode", "attributes", "title_suffix", "content", "user"]);        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "themes/custom/xtra/templates/media/media--image.html.twig";
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
        return array (  109 => 31,  106 => 30,  100 => 28,  97 => 27,  91 => 24,  88 => 23,  85 => 22,  79 => 20,  73 => 17,  67 => 15,  64 => 14,  62 => 13,  60 => 12,  58 => 11,  54 => 10,  49 => 9,  47 => 6,  46 => 5,  45 => 4,  44 => 2,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "themes/custom/xtra/templates/media/media--image.html.twig", "/var/www/html/web/themes/custom/xtra/templates/media/media--image.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 2, "if" => 11];
        static $filters = ["clean_class" => 4, "escape" => 9, "trim" => 14, "striptags" => 14, "render" => 14, "without" => 17];
        static $functions = ["path" => 15];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'if'],
                ['clean_class', 'escape', 'trim', 'striptags', 'render', 'without'],
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
