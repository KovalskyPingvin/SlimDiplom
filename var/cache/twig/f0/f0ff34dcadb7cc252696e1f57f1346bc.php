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

/* admin/compatibility.twig */
class __TwigTemplate_5e901ade1592df6ea6deae821f7ea556 extends Template
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

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'extra_css' => [$this, 'block_extra_css'],
            'content' => [$this, 'block_content'],
        ];
    }

    protected function doGetParent(array $context): bool|string|Template|TemplateWrapper
    {
        // line 1
        return "layouts/base.twig";
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        $this->parent = $this->load("layouts/base.twig", 1);
        yield from $this->parent->unwrap()->yield($context, array_merge($this->blocks, $blocks));
    }

    // line 3
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_title(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        yield "Совместимость картриджей";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_extra_css(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "    <link rel=\"stylesheet\" href=\"/css/admin/compatibilitystyle.css\">
";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 10
        yield "<div class=\"compatibility-page\">  <!-- ← Оборачиваем в div с классом -->
    <div class=\"content-wrapper\">
        <h1 class=\"h1-comp\">Совместимость картриджей и принтеров</h1>

        <div class=\"center-button\">
            <button id=\"openModal\" class=\"btn-add\">Добавить совместимость</button>
            <button id=\"openExportModal\" class=\"btn-export\">Экспорт</button>
        </div>

        <!-- Модалка экспорта -->
        <div id=\"exportModal\" class=\"modal-compatibility\">
            <div class=\"modal-content\">
                <span class=\"close-export\">&times;</span>
                <h2>Экспорт таблицы</h2>
                <form method=\"get\" action=\"/admin/compatibility/export\">
                    <label>Выберите формат:</label><br><br>
                    <select name=\"format\" required>
                        <option value=\"word\">Word</option>
                        <option value=\"excel\">Excel</option>
                    </select>
                    <br><br>
                    <button type=\"submit\">Экспортировать</button>
                </form>
            </div>
        </div>

        <div class=\"table-wrapper\">
            <table>
                <thead>
                    <tr>
                        <th>
                            Принтер<br>
                            <input type=\"text\" id=\"filterPrinter\" placeholder=\"Фильтр по принтеру\">
                        </th>
                        <th>
                            Картриджи<br>
                            <input type=\"text\" id=\"filterCartridge\" placeholder=\"Фильтр по картриджу\">
                        </th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    ";
        // line 52
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["compatibilities"] ?? null)) == 0)) {
            // line 53
            yield "                        <tr><td colspan=\"3\" style=\"text-align:center;\">Совместимости не найдены.</td></tr>
                    ";
        } else {
            // line 55
            yield "                        ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["compatibilities"] ?? null));
            foreach ($context['_seq'] as $context["printer"] => $context["cartridges"]) {
                // line 56
                yield "                            <tr>
                                <td>";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["printer"]);
                yield "</td>
                                <td class=\"cartridges-cell\">
                                    ";
                // line 59
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable($context["cartridges"]);
                foreach ($context['_seq'] as $context["_key"] => $context["cart"]) {
                    // line 60
                    yield "                                        <span class=\"cartridge-item\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["cart"]);
                    yield "</span>
                                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['cart'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 62
                yield "                                </td>
                                <td>
                                    <button class=\"editBtn btn-edit\" data-printer=\"";
                // line 64
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["printer"]);
                yield "\">Изменить</button>
                                    <a href=\"?delete=";
                // line 65
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\CoreExtension::urlencode($context["printer"]), "html", null, true);
                yield "\" class=\"delete-btn\" onclick=\"return confirm('Удалить все совместимости с этим принтером?')\">Удалить</a>
                                </td>
                            </tr>
                        ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['printer'], $context['cartridges'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 69
            yield "                    ";
        }
        // line 70
        yield "                </tbody>
            </table>
        </div>

        <!-- Модальное окно добавления -->
        <div id=\"modal\" class=\"modal-compatibility\">
            <div class=\"modal-content\">
                <span class=\"close\">&times;</span>
                <h2>Добавить совместимость</h2>
                <form method=\"post\">
                    <label>Принтер:</label>
                    <input type=\"text\" name=\"printer_name\" required>
                    <div id=\"cartridgeFields\">
                        <label>Картридж:</label>
                        <div class=\"cartridge-input-row\">
                            <input type=\"text\" name=\"cartridge_names[]\" required>
                            <button type=\"button\" class=\"remove-cartridge-btn\" title=\"Удалить\">&times;</button>
                        </div>
                    </div>
                    <button type=\"button\" id=\"addCartridgeField\">+</button>
                    <br><br>
                    <button type=\"submit\" name=\"add_compatibility\">Сохранить</button>
                </form>
            </div>
        </div>

        <!-- Модальное окно редактирования -->
        <div id=\"editModal\" class=\"modal-compatibility\">
            <div class=\"modal-content\">
                <span class=\"close-edit\">&times;</span>
                <h2>Редактировать совместимость</h2>
                <form method=\"post\">
                    <input type=\"hidden\" name=\"old_printer_name\" id=\"oldPrinterName\">
                    <label>Принтер:</label>
                    <input type=\"text\" name=\"new_printer_name\" id=\"editPrinterName\" required>
                    <div id=\"editCartridgeFields\">
                        <!-- JS заполнит -->
                    </div>
                    <button type=\"button\" id=\"addEditCartridgeField\">+</button>
                    <br><br>
                    <button type=\"submit\" name=\"edit_compatibility\">Сохранить изменения</button>
                </form>
            </div>
        </div>
    </div>

    ";
        // line 116
        yield from $this->load("components/notification.twig", 116)->unwrap()->yield($context);
        // line 117
        yield "</div>  <!-- ← Закрывающий div для .compatibility-page -->
<script src=\"/js/admin/compatibility.js\"></script>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/compatibility.twig";
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
        return array (  231 => 117,  229 => 116,  181 => 70,  178 => 69,  168 => 65,  164 => 64,  160 => 62,  151 => 60,  147 => 59,  142 => 57,  139 => 56,  134 => 55,  130 => 53,  128 => 52,  84 => 10,  77 => 9,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "admin/compatibility.twig", "C:\\OSPanel\\domains\\localhost\\templates\\admin\\compatibility.twig");
    }
}
