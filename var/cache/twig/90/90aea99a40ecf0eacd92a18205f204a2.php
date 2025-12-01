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

/* user/requests.twig */
class __TwigTemplate_b6033c180b46e3b55cf897088f956eb3 extends Template
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
            'extra_js' => [$this, 'block_extra_js'],
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
        yield "Мои заявки";
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
        yield "    <link rel=\"stylesheet\" href=\"/css/user/requests.css\">
";
        yield from [];
    }

    // line 9
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_extra_js(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 10
        yield "    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js\"></script>
    <script>
        function generateDoc(data) {
            const now = new Date();
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const year = now.getFullYear();
            const formattedDate = `\${day}.\${month}.\${year}`;

            const docContent = `
            <html xmlns:o=\"urn:schemas-microsoft-com:office:office\"
            xmlns:w=\"urn:schemas-microsoft-com:office:word\"
            xmlns=\"http://www.w3.org/TR/REC-html40\">
            <head>
              <meta charset=\"UTF-8\">
              <style>
                  body { font-family: 'Times New Roman', serif; }
                  .header-table { width: 100%; border-collapse: collapse; }
                  .header-table td { font-family: 'Times New Roman', serif; vertical-align: top; padding: 0; }
                  .header-left-column { width: 65%; }
                  .header-right-column { width: 35%; text-align: left; line-height: 1; }
                  .header-right-column p { margin-bottom: 0.4px; }
                  .main-content { margin-bottom: 40px; font-family: 'Times New Roman', serif; }
                  .presentation { text-align: center; font-weight: bold; }
                  .indented-paragraph { text-indent: 30px; font-family: 'Times New Roman', serif; }
                  .signature-block { margin-bottom: 20px; width: 100%; font-family: 'Times New Roman', serif; }
                  .signature-item span { font-size: 0.5em; display: block; margin-bottom: 2px; }
                  .signature-item hr { margin: 3px 0; border: none; border-bottom: 1px solid #000; }
              </style>
            </head>
            <body>
              <table class=\"header-table\">
                <tr>
                  <td class=\"header-left-column\"></td>
                  <td class=\"header-right-column\">
                    <p>Начальнику отдела СКСиС УИ</p>
                    <p>\\\${data.recipient}</p>
                    <p>\\\${data.department}</p>
                    <p>\\\${data.chief}</p>
                    <p>Тел.: \\\${data.phone}</p>
                  </td>
                </tr>
              </table>
              <div style=\"clear: both;\"></div>

              <div class=\"main-content\">
                <p class=\"presentation\">Представление</p>
                <p style=\"margin-bottom: 0; text-indent: 30px\">Прошу выполнить работу по замене картриджа к принтеру \"\\\${data.device}\", инвентарный № \\\${data.inventory}, № корпуса \\\${data.building}, № кабинета \\\${data.room}.</p>
                <p class=\"indented-paragraph\">В связи с тем, что \\\${data.reason}.</p>
              </div>

              <div class=\"date\">
                <p>\\\${formattedDate}</p>
                <br>
              </div>

              <div class=\"signature-block\">
                  <table style=\"width: 100%; border-collapse: collapse;\">
                    <tr>
                      <td style=\"width: 30%; text-align: center; vertical-align: top;\">
                          <hr style=\"border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px\">
                          <span style=\"font-size: 0.5em; text-align:center\">Должность руководителя подразделения</span>
                      </td>
                      <td style=\"width: 30%; text-align: center; vertical-align: top;\">
                          <hr style=\"border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px\">
                          <span style=\"font-size: 0.5em; text-align:center\">Подпись</span>
                      </td>
                      <td style=\"width: 30%; text-align: center; vertical-align: top;\">
                          <hr style=\"border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px\">
                          <span style=\"font-size: 0.5em; text-align:center\">И.О. Фамилия</span>
                      </td>
                    </tr>
                  </table>
              </div>
            </body>
            </html>
            `;

            const blob = new Blob(['\\ufeff', docContent], { type: 'application/msword' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = `Заявка_\\\${data.device || 'устройство'}_\\\${day}.\\\${month}.\\\${year}.doc`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // === Обработчик кнопки \"Печать\" ===
        document.querySelectorAll('.btn-print').forEach(button => {
            button.addEventListener('click', function () {
                const data = {
                    department: this.dataset.department,
                    chief: this.dataset.chief,
                    phone: this.dataset.phone,
                    device: this.dataset.device,
                    inventory: this.dataset.inventory,
                    building: this.dataset.building,
                    room: this.dataset.room,
                    reason: this.dataset.reason,
                    recipient: this.dataset.recipient,
                };

                if (typeof generateDoc === 'function') {
                    generateDoc(data);
                } else {
                    alert('Ошибка: функция generateDoc не найдена.');
                }
            });
        });

        // === Фильтр по статусу ===
        document.getElementById('filter-incomplete').addEventListener('change', function () {
            const showOnlyIncomplete = this.checked;
            document.querySelectorAll('.tr-request').forEach(row => {
                const statusCell = row.querySelector('.status-done, .status-pending');
                if (!statusCell) return;

                const status = statusCell.textContent.trim();
                if (showOnlyIncomplete) {
                    if (status === \"Завершен\") {
                        row.style.display = \"none\";
                    }
                } else {
                    row.style.display = \"\";
                }
            });
        });
    </script>
";
        yield from [];
    }

    // line 140
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 141
        yield "<div class=\"user-requests-container\"> <!-- ← Общий контейнер -->
    <div class=\"user-requests-content\"> <!-- ← Контентный блок -->
        <h1 class=\"h1-request\">Мои заявки</h1>

        <div class=\"request-filter\">
            <label>
                <input type=\"checkbox\" id=\"filter-incomplete\">
                Показать только незавершенные
            </label>
        </div>

        ";
        // line 152
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["requests"] ?? null)) > 0)) {
            // line 153
            yield "            <table class=\"table-request\">
                <thead>
                    <tr class=\"tr-request-header\">
                        <th>Тип</th>
                        <th>Отдел</th>
                        <th>Начальник отдела</th>
                        <th>Телефон</th>
                        <th>Инв. номер</th>
                        <th>Устройство</th>
                        <th>Корпус</th>
                        <th>Кабинет</th>
                        <th>Причина</th>
                        <th>Дата</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 171
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["requests"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["req"]) {
                // line 172
                yield "                        <tr class=\"tr-request\">
                            <td>";
                // line 173
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "type", [], "any", false, false, false, 173));
                yield "</td>
                            <td title=\"";
                // line 174
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "department_name", [], "any", false, false, false, 174));
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['App\Twig\Extensions\TwigExtensions']->truncate(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "department_name", [], "any", false, false, false, 174), 20));
                yield "</td>
                            <td title=\"";
                // line 175
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "head_full_name", [], "any", false, false, false, 175));
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['App\Twig\Extensions\TwigExtensions']->truncate(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "head_full_name", [], "any", false, false, false, 175), 20));
                yield "</td>
                            <td>";
                // line 176
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "phone", [], "any", false, false, false, 176));
                yield "</td>
                            <td>";
                // line 177
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "inventory_number", [], "any", false, false, false, 177));
                yield "</td>
                            <td title=\"";
                // line 178
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "device_name", [], "any", false, false, false, 178));
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['App\Twig\Extensions\TwigExtensions']->truncate(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "device_name", [], "any", false, false, false, 178), 20));
                yield "</td>
                            <td>";
                // line 179
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "building_number", [], "any", false, false, false, 179));
                yield "</td>
                            <td>";
                // line 180
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "room_number", [], "any", false, false, false, 180));
                yield "</td>
                            <td title=\"";
                // line 181
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "reason", [], "any", false, false, false, 181));
                yield "\">";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['App\Twig\Extensions\TwigExtensions']->truncate(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "reason", [], "any", false, false, false, 181), 20));
                yield "</td>
                            <td>";
                // line 182
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatDate(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "submission_date", [], "any", false, false, false, 182), "d.m.Y H:i"), "html", null, true);
                yield "</td>
                            <td class=\"status-cell status-";
                // line 183
                yield (((CoreExtension::getAttribute($this->env, $this->source, $context["req"], "status", [], "any", false, false, false, 183) == "Завершен")) ? ("done") : ("pending"));
                yield "\">
                                ";
                // line 184
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "status", [], "any", false, false, false, 184), "html", null, true);
                yield "
                            </td>
                            <td>
                                <button class=\"btn-request btn-print\"
                                    data-department=\"";
                // line 188
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "department_name", [], "any", false, false, false, 188));
                yield "\"
                                    data-chief=\"";
                // line 189
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "head_full_name", [], "any", false, false, false, 189));
                yield "\"
                                    data-phone=\"";
                // line 190
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "phone", [], "any", false, false, false, 190));
                yield "\"
                                    data-device=\"";
                // line 191
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "device_name", [], "any", false, false, false, 191));
                yield "\"
                                    data-inventory=\"";
                // line 192
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "inventory_number", [], "any", false, false, false, 192));
                yield "\"
                                    data-building=\"";
                // line 193
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "building_number", [], "any", false, false, false, 193));
                yield "\"
                                    data-room=\"";
                // line 194
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "room_number", [], "any", false, false, false, 194));
                yield "\"
                                    data-reason=\"";
                // line 195
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["req"], "reason", [], "any", false, false, false, 195));
                yield "\"
                                    data-recipient=\"";
                // line 196
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(($context["recipient_name"] ?? null));
                yield "\">
                                    Печать
                                </button>
                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['req'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 202
            yield "                </tbody>
            </table>

            ";
            // line 205
            if ((($context["total_pages"] ?? null) > 1)) {
                // line 206
                yield "                <div class=\"pagination requests-pagination\">
                    ";
                // line 207
                $context['_parent'] = $context;
                $context['_seq'] = CoreExtension::ensureTraversable(range(1, ($context["total_pages"] ?? null)));
                foreach ($context['_seq'] as $context["_key"] => $context["i"]) {
                    // line 208
                    yield "                        <a href=\"?page=";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "\" class=\"";
                    yield ((($context["i"] == ($context["current_page"] ?? null))) ? ("active") : (""));
                    yield "\">";
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($context["i"], "html", null, true);
                    yield "</a>
                    ";
                }
                $_parent = $context['_parent'];
                unset($context['_seq'], $context['_key'], $context['i'], $context['_parent']);
                $context = array_intersect_key($context, $_parent) + $_parent;
                // line 210
                yield "                </div>
            ";
            }
            // line 212
            yield "
        ";
        } else {
            // line 214
            yield "            <p class=\"p-request-empty\">У вас пока нет заявок.</p>
        ";
        }
        // line 216
        yield "    </div>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "user/requests.twig";
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
        return array (  409 => 216,  405 => 214,  401 => 212,  397 => 210,  384 => 208,  380 => 207,  377 => 206,  375 => 205,  370 => 202,  358 => 196,  354 => 195,  350 => 194,  346 => 193,  342 => 192,  338 => 191,  334 => 190,  330 => 189,  326 => 188,  319 => 184,  315 => 183,  311 => 182,  305 => 181,  301 => 180,  297 => 179,  291 => 178,  287 => 177,  283 => 176,  277 => 175,  271 => 174,  267 => 173,  264 => 172,  260 => 171,  240 => 153,  238 => 152,  225 => 141,  218 => 140,  85 => 10,  78 => 9,  72 => 6,  65 => 5,  54 => 3,  43 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/base.twig' %}

{% block title %}Мои заявки{% endblock %}

{% block extra_css %}
    <link rel=\"stylesheet\" href=\"/css/user/requests.css\">
{% endblock %}

{% block extra_js %}
    <script src=\"https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js\"></script>
    <script>
        function generateDoc(data) {
            const now = new Date();
            const day = String(now.getDate()).padStart(2, '0');
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const year = now.getFullYear();
            const formattedDate = `\${day}.\${month}.\${year}`;

            const docContent = `
            <html xmlns:o=\"urn:schemas-microsoft-com:office:office\"
            xmlns:w=\"urn:schemas-microsoft-com:office:word\"
            xmlns=\"http://www.w3.org/TR/REC-html40\">
            <head>
              <meta charset=\"UTF-8\">
              <style>
                  body { font-family: 'Times New Roman', serif; }
                  .header-table { width: 100%; border-collapse: collapse; }
                  .header-table td { font-family: 'Times New Roman', serif; vertical-align: top; padding: 0; }
                  .header-left-column { width: 65%; }
                  .header-right-column { width: 35%; text-align: left; line-height: 1; }
                  .header-right-column p { margin-bottom: 0.4px; }
                  .main-content { margin-bottom: 40px; font-family: 'Times New Roman', serif; }
                  .presentation { text-align: center; font-weight: bold; }
                  .indented-paragraph { text-indent: 30px; font-family: 'Times New Roman', serif; }
                  .signature-block { margin-bottom: 20px; width: 100%; font-family: 'Times New Roman', serif; }
                  .signature-item span { font-size: 0.5em; display: block; margin-bottom: 2px; }
                  .signature-item hr { margin: 3px 0; border: none; border-bottom: 1px solid #000; }
              </style>
            </head>
            <body>
              <table class=\"header-table\">
                <tr>
                  <td class=\"header-left-column\"></td>
                  <td class=\"header-right-column\">
                    <p>Начальнику отдела СКСиС УИ</p>
                    <p>\\\${data.recipient}</p>
                    <p>\\\${data.department}</p>
                    <p>\\\${data.chief}</p>
                    <p>Тел.: \\\${data.phone}</p>
                  </td>
                </tr>
              </table>
              <div style=\"clear: both;\"></div>

              <div class=\"main-content\">
                <p class=\"presentation\">Представление</p>
                <p style=\"margin-bottom: 0; text-indent: 30px\">Прошу выполнить работу по замене картриджа к принтеру \"\\\${data.device}\", инвентарный № \\\${data.inventory}, № корпуса \\\${data.building}, № кабинета \\\${data.room}.</p>
                <p class=\"indented-paragraph\">В связи с тем, что \\\${data.reason}.</p>
              </div>

              <div class=\"date\">
                <p>\\\${formattedDate}</p>
                <br>
              </div>

              <div class=\"signature-block\">
                  <table style=\"width: 100%; border-collapse: collapse;\">
                    <tr>
                      <td style=\"width: 30%; text-align: center; vertical-align: top;\">
                          <hr style=\"border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px\">
                          <span style=\"font-size: 0.5em; text-align:center\">Должность руководителя подразделения</span>
                      </td>
                      <td style=\"width: 30%; text-align: center; vertical-align: top;\">
                          <hr style=\"border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px\">
                          <span style=\"font-size: 0.5em; text-align:center\">Подпись</span>
                      </td>
                      <td style=\"width: 30%; text-align: center; vertical-align: top;\">
                          <hr style=\"border: none; border-bottom: 1px solid #000; margin: 3px 0; width:150px\">
                          <span style=\"font-size: 0.5em; text-align:center\">И.О. Фамилия</span>
                      </td>
                    </tr>
                  </table>
              </div>
            </body>
            </html>
            `;

            const blob = new Blob(['\\ufeff', docContent], { type: 'application/msword' });
            const link = document.createElement('a');
            link.href = URL.createObjectURL(blob);
            link.download = `Заявка_\\\${data.device || 'устройство'}_\\\${day}.\\\${month}.\\\${year}.doc`;
            document.body.appendChild(link);
            link.click();
            document.body.removeChild(link);
        }

        // === Обработчик кнопки \"Печать\" ===
        document.querySelectorAll('.btn-print').forEach(button => {
            button.addEventListener('click', function () {
                const data = {
                    department: this.dataset.department,
                    chief: this.dataset.chief,
                    phone: this.dataset.phone,
                    device: this.dataset.device,
                    inventory: this.dataset.inventory,
                    building: this.dataset.building,
                    room: this.dataset.room,
                    reason: this.dataset.reason,
                    recipient: this.dataset.recipient,
                };

                if (typeof generateDoc === 'function') {
                    generateDoc(data);
                } else {
                    alert('Ошибка: функция generateDoc не найдена.');
                }
            });
        });

        // === Фильтр по статусу ===
        document.getElementById('filter-incomplete').addEventListener('change', function () {
            const showOnlyIncomplete = this.checked;
            document.querySelectorAll('.tr-request').forEach(row => {
                const statusCell = row.querySelector('.status-done, .status-pending');
                if (!statusCell) return;

                const status = statusCell.textContent.trim();
                if (showOnlyIncomplete) {
                    if (status === \"Завершен\") {
                        row.style.display = \"none\";
                    }
                } else {
                    row.style.display = \"\";
                }
            });
        });
    </script>
{% endblock %}

{% block content %}
<div class=\"user-requests-container\"> <!-- ← Общий контейнер -->
    <div class=\"user-requests-content\"> <!-- ← Контентный блок -->
        <h1 class=\"h1-request\">Мои заявки</h1>

        <div class=\"request-filter\">
            <label>
                <input type=\"checkbox\" id=\"filter-incomplete\">
                Показать только незавершенные
            </label>
        </div>

        {% if requests|length > 0 %}
            <table class=\"table-request\">
                <thead>
                    <tr class=\"tr-request-header\">
                        <th>Тип</th>
                        <th>Отдел</th>
                        <th>Начальник отдела</th>
                        <th>Телефон</th>
                        <th>Инв. номер</th>
                        <th>Устройство</th>
                        <th>Корпус</th>
                        <th>Кабинет</th>
                        <th>Причина</th>
                        <th>Дата</th>
                        <th>Статус</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    {% for req in requests %}
                        <tr class=\"tr-request\">
                            <td>{{ req.type|e }}</td>
                            <td title=\"{{ req.department_name|e }}\">{{ req.department_name|truncate(20)|e }}</td>
                            <td title=\"{{ req.head_full_name|e }}\">{{ req.head_full_name|truncate(20)|e }}</td>
                            <td>{{ req.phone|e }}</td>
                            <td>{{ req.inventory_number|e }}</td>
                            <td title=\"{{ req.device_name|e }}\">{{ req.device_name|truncate(20)|e }}</td>
                            <td>{{ req.building_number|e }}</td>
                            <td>{{ req.room_number|e }}</td>
                            <td title=\"{{ req.reason|e }}\">{{ req.reason|truncate(20)|e }}</td>
                            <td>{{ req.submission_date|date('d.m.Y H:i') }}</td>
                            <td class=\"status-cell status-{{ req.status == 'Завершен' ? 'done' : 'pending' }}\">
                                {{ req.status }}
                            </td>
                            <td>
                                <button class=\"btn-request btn-print\"
                                    data-department=\"{{ req.department_name|e }}\"
                                    data-chief=\"{{ req.head_full_name|e }}\"
                                    data-phone=\"{{ req.phone|e }}\"
                                    data-device=\"{{ req.device_name|e }}\"
                                    data-inventory=\"{{ req.inventory_number|e }}\"
                                    data-building=\"{{ req.building_number|e }}\"
                                    data-room=\"{{ req.room_number|e }}\"
                                    data-reason=\"{{ req.reason|e }}\"
                                    data-recipient=\"{{ recipient_name|e }}\">
                                    Печать
                                </button>
                            </td>
                        </tr>
                    {% endfor %}
                </tbody>
            </table>

            {% if total_pages > 1 %}
                <div class=\"pagination requests-pagination\">
                    {% for i in 1..total_pages %}
                        <a href=\"?page={{ i }}\" class=\"{{ i == current_page ? 'active' : '' }}\">{{ i }}</a>
                    {% endfor %}
                </div>
            {% endif %}

        {% else %}
            <p class=\"p-request-empty\">У вас пока нет заявок.</p>
        {% endif %}
    </div>
</div>
{% endblock %}", "user/requests.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\user\\requests.twig");
    }
}
