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

/* radix:views-view */
class __TwigTemplate_f57a6d5d5f9a78dbc4c00c2db5710724 extends Template
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
            'views_view_wrapper' => [$this, 'block_views_view_wrapper'],
            'views_view_title' => [$this, 'block_views_view_title'],
            'views_header' => [$this, 'block_views_header'],
            'views_filters' => [$this, 'block_views_filters'],
            'views_attachment_before' => [$this, 'block_views_attachment_before'],
            'views_rows' => [$this, 'block_views_rows'],
            'views_pager' => [$this, 'block_views_pager'],
            'views_attachment_after' => [$this, 'block_views_attachment_after'],
            'views_more' => [$this, 'block_views_more'],
            'views_footer' => [$this, 'block_views_footer'],
            'views_feed_icons' => [$this, 'block_views_feed_icons'],
        ];
        $this->sandbox = $this->extensions[SandboxExtension::class];
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("core/components.radix--views-view"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->addAdditionalContext($context, "radix:views-view"));
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\ComponentsTwigExtension']->validateProps($context, "radix:views-view"));
        // line 33
        $context["views_attributes"] = ((($context["attributes"] ?? null)) ? ($context["attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 34
        $context["views_title_attributes"] = ((($context["views_title_attributes"] ?? null)) ? ($context["views_title_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 35
        $context["views_header_attributes"] = ((($context["views_header_attributes"] ?? null)) ? ($context["views_header_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 36
        $context["views_filters_attributes"] = ((($context["views_filters_attributes"] ?? null)) ? ($context["views_filters_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 37
        $context["views_rows_attributes"] = ((($context["views_rows_attributes"] ?? null)) ? ($context["views_rows_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 38
        $context["views_empty_attributes"] = ((($context["views_empty_attributes"] ?? null)) ? ($context["views_empty_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 39
        $context["views_footer_attributes"] = ((($context["views_footer_attributes"] ?? null)) ? ($context["views_footer_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 40
        $context["views_attachment_before_attributes"] = ((($context["views_attachment_before_attributes"] ?? null)) ? ($context["views_attachment_before_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 41
        $context["views_attachment_after_attributes"] = ((($context["views_attachment_after_attributes"] ?? null)) ? ($context["views_attachment_after_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 42
        $context["views_pager_attributes"] = ((($context["views_pager_attributes"] ?? null)) ? ($context["views_pager_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 43
        $context["views_more_attributes"] = ((($context["views_more_attributes"] ?? null)) ? ($context["views_more_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 44
        $context["views_feed_icons_attributes"] = ((($context["views_feed_icons_attributes"] ?? null)) ? ($context["views_feed_icons_attributes"]) : ($this->extensions['Drupal\Core\Template\TwigExtension']->createAttribute()));
        // line 45
        yield "
";
        // line 47
        $context["views_classes"] = Twig\Extension\CoreExtension::merge(["view", ("view-" . \Drupal\Component\Utility\Html::getClass(        // line 49
($context["id"] ?? null))), ("view-id-" .         // line 50
($context["id"] ?? null)), ("view-display-id-" .         // line 51
($context["display_id"] ?? null)), ((        // line 52
($context["dom_id"] ?? null)) ? (("js-view-dom-id-" . ($context["dom_id"] ?? null))) : ("")), ((        // line 53
($context["css_name"] ?? null)) ? (("view-" . ($context["css_name"] ?? null))) : (""))], ((        // line 54
($context["view_view_utility_classes"] ?? null)) ? ($context["view_view_utility_classes"]) : ([])));
        // line 56
        yield "
";
        // line 58
        $context["views_title_classes"] = Twig\Extension\CoreExtension::merge(["view-title"], ((        // line 60
($context["views_title_utility_classes"] ?? null)) ? ($context["views_title_utility_classes"]) : ([])));
        // line 62
        yield "
";
        // line 64
        $context["views_header_classes"] = Twig\Extension\CoreExtension::merge(["view-header"], ((        // line 66
($context["views_header_utility_classes"] ?? null)) ? ($context["views_header_utility_classes"]) : ([])));
        // line 68
        yield "
";
        // line 70
        $context["views_filters_classes"] = Twig\Extension\CoreExtension::merge(["view-filters"], ((        // line 72
($context["views_filters_utility_classes"] ?? null)) ? ($context["views_filters_utility_classes"]) : ([])));
        // line 74
        yield "
";
        // line 76
        $context["views_rows_classes"] = Twig\Extension\CoreExtension::merge(["view-content"], ((        // line 78
($context["views_rows_utility_classes"] ?? null)) ? ($context["views_rows_utility_classes"]) : ([])));
        // line 80
        yield "
";
        // line 82
        $context["views_empty_classes"] = Twig\Extension\CoreExtension::merge(["view-empty"], ((        // line 84
($context["views_empty_utility_classes"] ?? null)) ? ($context["views_empty_utility_classes"]) : ([])));
        // line 86
        yield "
";
        // line 88
        $context["views_footer_classes"] = Twig\Extension\CoreExtension::merge(["view-footer"], ((        // line 90
($context["views_footer_utility_classes"] ?? null)) ? ($context["views_footer_utility_classes"]) : ([])));
        // line 92
        yield "
";
        // line 94
        $context["views_attachment_before_classes"] = Twig\Extension\CoreExtension::merge(["attachment", "attachment-before"], ((        // line 97
($context["views_attachment_before_utility_classes"] ?? null)) ? ($context["views_attachment_before_utility_classes"]) : ([])));
        // line 99
        yield "
";
        // line 101
        $context["views_attachment_after_classes"] = Twig\Extension\CoreExtension::merge(["attachment", "attachment-after"], ((        // line 104
($context["views_attachment_after_utility_classes"] ?? null)) ? ($context["views_attachment_after_utility_classes"]) : ([])));
        // line 106
        yield "
";
        // line 108
        $context["views_pager_classes"] = Twig\Extension\CoreExtension::merge(["pager"], ((        // line 110
($context["views_pager_utility_classes"] ?? null)) ? ($context["views_pager_utility_classes"]) : ([])));
        // line 112
        yield "
";
        // line 114
        $context["views_more_classes"] = Twig\Extension\CoreExtension::merge([""], ((($context["views_more_utility_classes"] ?? null)) ? ($context["views_more_utility_classes"]) : ([])));
        // line 116
        yield "
";
        // line 118
        $context["views_feed_icons_classes"] = Twig\Extension\CoreExtension::merge(["feed-icons"], ((        // line 120
($context["views_feed_icons_utility_classes"] ?? null)) ? ($context["views_feed_icons_utility_classes"]) : ([])));
        // line 122
        yield "
<div ";
        // line 123
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["views_attributes"] ?? null), "addClass", [($context["views_classes"] ?? null)], "method", false, false, true, 123), "html", null, true);
        yield ">
  ";
        // line 124
        yield from $this->unwrap()->yieldBlock('views_view_wrapper', $context, $blocks);
        // line 209
        yield "</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "id", "display_id", "dom_id", "css_name", "view_view_utility_classes", "views_title_utility_classes", "views_header_utility_classes", "views_filters_utility_classes", "views_rows_utility_classes", "views_empty_utility_classes", "views_footer_utility_classes", "views_attachment_before_utility_classes", "views_attachment_after_utility_classes", "views_pager_utility_classes", "views_more_utility_classes", "views_feed_icons_utility_classes", "title_prefix", "title_suffix", "title", "header", "exposed", "attachment_before", "rows", "empty", "pager", "attachment_after", "more", "footer", "feed_icons"]);        yield from [];
    }

    // line 124
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_view_wrapper(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 125
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_prefix"] ?? null), "html", null, true);
        yield "
    ";
        // line 126
        yield from $this->unwrap()->yieldBlock('views_view_title', $context, $blocks);
        // line 133
        yield "    ";
        yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title_suffix"] ?? null), "html", null, true);
        yield "

    ";
        // line 135
        yield from $this->unwrap()->yieldBlock('views_header', $context, $blocks);
        // line 142
        yield "
    ";
        // line 143
        yield from $this->unwrap()->yieldBlock('views_filters', $context, $blocks);
        // line 150
        yield "
    ";
        // line 151
        yield from $this->unwrap()->yieldBlock('views_attachment_before', $context, $blocks);
        // line 158
        yield "
    ";
        // line 159
        yield from $this->unwrap()->yieldBlock('views_rows', $context, $blocks);
        // line 170
        yield "
    ";
        // line 171
        yield from $this->unwrap()->yieldBlock('views_pager', $context, $blocks);
        // line 178
        yield "
    ";
        // line 179
        yield from $this->unwrap()->yieldBlock('views_attachment_after', $context, $blocks);
        // line 186
        yield "
    ";
        // line 187
        yield from $this->unwrap()->yieldBlock('views_more', $context, $blocks);
        // line 192
        yield "
    ";
        // line 193
        yield from $this->unwrap()->yieldBlock('views_footer', $context, $blocks);
        // line 200
        yield "
    ";
        // line 201
        yield from $this->unwrap()->yieldBlock('views_feed_icons', $context, $blocks);
        // line 208
        yield "  ";
        yield from [];
    }

    // line 126
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_view_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 127
        yield "      ";
        if (($context["title"] ?? null)) {
            // line 128
            yield "        <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["views_title_attributes"] ?? null), "addClass", [($context["views_title_classes"] ?? null)], "method", false, false, true, 128), "html", null, true);
            yield ">
          ";
            // line 129
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["title"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 132
        yield "    ";
        yield from [];
    }

    // line 135
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_header(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 136
        yield "      ";
        if (($context["header"] ?? null)) {
            // line 137
            yield "        <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["views_header_attributes"] ?? null), "addClass", [($context["views_header_classes"] ?? null)], "method", false, false, true, 137), "html", null, true);
            yield ">
          ";
            // line 138
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["header"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 141
        yield "    ";
        yield from [];
    }

    // line 143
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_filters(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 144
        yield "      ";
        if (($context["exposed"] ?? null)) {
            // line 145
            yield "        <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["views_filters_attributes"] ?? null), "addClass", [($context["views_filters_classes"] ?? null)], "method", false, false, true, 145), "html", null, true);
            yield ">
          ";
            // line 146
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["exposed"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 149
        yield "    ";
        yield from [];
    }

    // line 151
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_attachment_before(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 152
        yield "      ";
        if (($context["attachment_before"] ?? null)) {
            // line 153
            yield "        <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["views_attachment_before_attributes"] ?? null), "addClass", [($context["views_attachment_before_classes"] ?? null)], "method", false, false, true, 153), "html", null, true);
            yield ">
          ";
            // line 154
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attachment_before"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 157
        yield "    ";
        yield from [];
    }

    // line 159
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_rows(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 160
        yield "      ";
        if (($context["rows"] ?? null)) {
            // line 161
            yield "        <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["views_rows_attributes"] ?? null), "addClass", [($context["views_rows_classes"] ?? null)], "method", false, false, true, 161), "html", null, true);
            yield ">
          ";
            // line 162
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["rows"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        } elseif (        // line 164
($context["empty"] ?? null)) {
            // line 165
            yield "        <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["views_empty_attributes"] ?? null), "addClass", [($context["views_empty_classes"] ?? null)], "method", false, false, true, 165), "html", null, true);
            yield ">
          ";
            // line 166
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["empty"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 169
        yield "    ";
        yield from [];
    }

    // line 171
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_pager(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 172
        yield "      ";
        if (($context["pager"] ?? null)) {
            // line 173
            yield "        <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["views_pager_attributes"] ?? null), "addClass", [($context["views_pager_classes"] ?? null)], "method", false, false, true, 173), "html", null, true);
            yield ">
          ";
            // line 174
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["pager"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 177
        yield "    ";
        yield from [];
    }

    // line 179
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_attachment_after(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 180
        yield "      ";
        if (($context["attachment_after"] ?? null)) {
            // line 181
            yield "        <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["views_attachment_after_attributes"] ?? null), "addClass", [($context["views_attachment_after_classes"] ?? null)], "method", false, false, true, 181), "html", null, true);
            yield ">
          ";
            // line 182
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["attachment_after"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 185
        yield "    ";
        yield from [];
    }

    // line 187
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_more(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 188
        yield "      ";
        if (($context["more"] ?? null)) {
            // line 189
            yield "        ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->addClass(($context["more"] ?? null), ($context["views_more_classes"] ?? null)), "html", null, true);
            yield "
      ";
        }
        // line 191
        yield "    ";
        yield from [];
    }

    // line 193
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_footer(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 194
        yield "      ";
        if (($context["footer"] ?? null)) {
            // line 195
            yield "        <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["views_footer_attributes"] ?? null), "addClass", [($context["views_footer_classes"] ?? null)], "method", false, false, true, 195), "html", null, true);
            yield ">
          ";
            // line 196
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["footer"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 199
        yield "    ";
        yield from [];
    }

    // line 201
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_views_feed_icons(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 202
        yield "      ";
        if (($context["feed_icons"] ?? null)) {
            // line 203
            yield "        <div ";
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, CoreExtension::getAttribute($this->env, $this->source, ($context["views_feed_icons_attributes"] ?? null), "addClass", [($context["views_feed_icons_classes"] ?? null)], "method", false, false, true, 203), "html", null, true);
            yield ">
          ";
            // line 204
            yield $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, ($context["feed_icons"] ?? null), "html", null, true);
            yield "
        </div>
      ";
        }
        // line 207
        yield "    ";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "radix:views-view";
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
        return array (  504 => 207,  498 => 204,  493 => 203,  490 => 202,  483 => 201,  478 => 199,  472 => 196,  467 => 195,  464 => 194,  457 => 193,  452 => 191,  446 => 189,  443 => 188,  436 => 187,  431 => 185,  425 => 182,  420 => 181,  417 => 180,  410 => 179,  405 => 177,  399 => 174,  394 => 173,  391 => 172,  384 => 171,  379 => 169,  373 => 166,  368 => 165,  366 => 164,  361 => 162,  356 => 161,  353 => 160,  346 => 159,  341 => 157,  335 => 154,  330 => 153,  327 => 152,  320 => 151,  315 => 149,  309 => 146,  304 => 145,  301 => 144,  294 => 143,  289 => 141,  283 => 138,  278 => 137,  275 => 136,  268 => 135,  263 => 132,  257 => 129,  252 => 128,  249 => 127,  242 => 126,  237 => 208,  235 => 201,  232 => 200,  230 => 193,  227 => 192,  225 => 187,  222 => 186,  220 => 179,  217 => 178,  215 => 171,  212 => 170,  210 => 159,  207 => 158,  205 => 151,  202 => 150,  200 => 143,  197 => 142,  195 => 135,  189 => 133,  187 => 126,  182 => 125,  175 => 124,  168 => 209,  166 => 124,  162 => 123,  159 => 122,  157 => 120,  156 => 118,  153 => 116,  151 => 114,  148 => 112,  146 => 110,  145 => 108,  142 => 106,  140 => 104,  139 => 101,  136 => 99,  134 => 97,  133 => 94,  130 => 92,  128 => 90,  127 => 88,  124 => 86,  122 => 84,  121 => 82,  118 => 80,  116 => 78,  115 => 76,  112 => 74,  110 => 72,  109 => 70,  106 => 68,  104 => 66,  103 => 64,  100 => 62,  98 => 60,  97 => 58,  94 => 56,  92 => 54,  91 => 53,  90 => 52,  89 => 51,  88 => 50,  87 => 49,  86 => 47,  83 => 45,  81 => 44,  79 => 43,  77 => 42,  75 => 41,  73 => 40,  71 => 39,  69 => 38,  67 => 37,  65 => 36,  63 => 35,  61 => 34,  59 => 33,  55 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "radix:views-view", "themes/contrib/radix/components/views-view/views-view.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = ["set" => 33, "block" => 124, "if" => 127];
        static $filters = ["merge" => 54, "clean_class" => 49, "escape" => 123, "add_class" => 189];
        static $functions = ["create_attribute" => 33];

        try {
            $this->sandbox->checkSecurity(
                ['set', 'block', 'if'],
                ['merge', 'clean_class', 'escape', 'add_class'],
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
