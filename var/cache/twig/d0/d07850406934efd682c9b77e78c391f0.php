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

/* admin/editusers.twig */
class __TwigTemplate_6a55afd09b29103de5754983f8c4d196 extends Template
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
        yield "Управление учетными записями";
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
        yield "    <link rel=\"stylesheet\" href=\"/css/admin/editusersstyle.css\">  <!-- ✅ ПРАВИЛЬНОЕ ИМЯ ФАЙЛА -->
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
        yield "<div class=\"editusers-page\">
    <div class=\"content-wrapper\">
        <h1 class=\"h1-editusers\">Управление учетными записями</h1>

        <!-- Форма добавления -->
        <div class=\"form-add-user\">
            <h2>Добавить нового пользователя</h2>
            <form method=\"post\" class=\"form-user\">
                <input type=\"hidden\" name=\"action\" value=\"add\">
                <label>Логин:
                    <input type=\"text\" name=\"log\" required>
                </label>
                <label>Пароль:
                    <input type=\"text\" name=\"pass\" required>
                </label>
                <label>Имя пользователя:
                    <input type=\"text\" name=\"username\" required>
                </label>
                <label>Роль:
                    <select name=\"role\" required>
                        <option value=\"user\">Пользователь</option>
                        <option value=\"admin_ui\">Начальник УИиЦР</option>
                        <option value=\"admin_sksis\">Администратор отдела СКСиС</option>
                        <option value=\"admin_uvl\">Администратор отдела УВЛ</option>
                        <option value=\"admin_st\">Администратор отдела СТ</option>
                        <option value=\"admin_it\">Администратор отдела ИТ</option>
                    </select>
                </label>
                <button type=\"submit\" class=\"btn-add-user\">Добавить</button>
            </form>
        </div>

        <!-- Таблица пользователей -->
        ";
        // line 43
        if ((Twig\Extension\CoreExtension::length($this->env->getCharset(), ($context["users"] ?? null)) > 0)) {
            // line 44
            yield "            <table class=\"table-users\">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Логин</th>
                        <th>Имя пользователя</th>
                        <th>Роль</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                    ";
            // line 55
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["users"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["user"]) {
                // line 56
                yield "                        <tr>
                            <td>";
                // line 57
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id_user", [], "any", false, false, false, 57), "html", null, true);
                yield "</td>
                            <td>";
                // line 58
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "log", [], "any", false, false, false, 58));
                yield "</td>
                            <td>";
                // line 59
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "username", [], "any", false, false, false, 59));
                yield "</td>
                            <td>
                                ";
                // line 61
                $context["roleName"] = (($_v0 = ["admin_ui" => "Начальник УИиЦР", "admin_sksis" => "Администратор отдела СКСиС", "admin_uvl" => "Администратор отдела УВЛ", "admin_st" => "Администратор отдела СТ", "admin_it" => "Администратор отдела ИТ", "user" => "Пользователь"]) && is_array($_v0) || $_v0 instanceof ArrayAccess ? ($_v0[CoreExtension::getAttribute($this->env, $this->source,                 // line 68
$context["user"], "role", [], "any", false, false, false, 68)] ?? null) : null);
                // line 69
                yield "                                ";
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(((array_key_exists("roleName", $context)) ? (Twig\Extension\CoreExtension::default(($context["roleName"] ?? null), "Неизвестная роль")) : ("Неизвестная роль")), "html", null, true);
                yield "
                            </td>
                            <td>
                                <button class=\"btn-edit\" data-id=\"";
                // line 72
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id_user", [], "any", false, false, false, 72), "html", null, true);
                yield "\">Изменить</button>
                                ";
                // line 73
                if (!CoreExtension::inFilter(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "role", [], "any", false, false, false, 73), ["admin_ui", "admin_it"])) {
                    // line 74
                    yield "                                    <form method=\"POST\" style=\"display:inline;\" onsubmit=\"return confirm('Удалить пользователя?')\">
                                        <input type=\"hidden\" name=\"action\" value=\"delete\">
                                        <input type=\"hidden\" name=\"id\" value=\"";
                    // line 76
                    yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["user"], "id_user", [], "any", false, false, false, 76), "html", null, true);
                    yield "\">
                                        <button type=\"submit\" class=\"btn-delete\">Удалить</button>
                                    </form>
                                ";
                }
                // line 80
                yield "                            </td>
                        </tr>
                    ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['user'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 83
            yield "                </tbody>
            </table>
        ";
        } else {
            // line 86
            yield "            <p>Нет пользователей.</p>
        ";
        }
        // line 88
        yield "    </div>
</div>

<!-- Модальное окно редактирования -->
<div id=\"editModal\" class=\"modal-overlay\">
    <div class=\"modal-container\">
        <span class=\"modal-close\" onclick=\"closeEditModal()\">&times;</span>
        <h2>Редактировать пользователя</h2>
        <form id=\"editForm\" method=\"POST\">
            <input type=\"hidden\" name=\"action\" value=\"edit\">
            <input type=\"hidden\" name=\"id\" id=\"editUserId\">
            <label>Логин:
                <input type=\"text\" name=\"log\" id=\"editLog\" required>
            </label>
            <label>Пароль (оставьте пустым, чтобы не менять):
                <input type=\"text\" name=\"pass\" id=\"editPass\">
            </label>
            <label>Имя пользователя:
                <input type=\"text\" name=\"username\" id=\"editUsername\" required>
            </label>
            <label>Роль:
                <select name=\"role\" id=\"editRole\" required>
                    <option value=\"user\">Пользователь</option>
                    <option value=\"admin_ui\">Начальник УИиЦР</option>
                    <option value=\"admin_sksis\">Администратор отдела СКСиС</option>
                    <option value=\"admin_uvl\">Администратор отдела УВЛ</option>
                    <option value=\"admin_st\">Администратор отдела СТ</option>
                    <option value=\"admin_it\">Администратор отдела ИТ</option>
                </select>
            </label>
            <button type=\"submit\" class=\"btn-save\">Сохранить</button>
        </form>
    </div>
</div>

<script>
    function openEditModal(id, log, username, role) {
        document.getElementById('editUserId').value = id;
        document.getElementById('editLog').value = log;
        document.getElementById('editUsername').value = username;
        document.getElementById('editRole').value = role;
        document.getElementById('editModal').classList.add('active');
    }

    function closeEditModal() {
        document.getElementById('editModal').classList.remove('active');
    }

    document.querySelectorAll('.btn-edit').forEach(btn => {
        btn.addEventListener('click', function() {
            const tr = this.closest('tr');
            const id = tr.cells[0].textContent;
            const log = tr.cells[1].textContent;
            const username = tr.cells[2].textContent;
            const role = this.parentNode.querySelector('input[name=\"role\"]').value || this.dataset.role;

            // Получим роль из текста ячейки
            const roleText = tr.cells[3].textContent.trim();
            const roleMap = {
                'Начальник УИиЦР': 'admin_ui',
                'Администратор отдела СКСиС': 'admin_sksis',
                'Администратор отдела УВЛ': 'admin_uvl',
                'Администратор отдела СТ': 'admin_st',
                'Администратор отдела ИТ': 'admin_it',
                'Пользователь': 'user'
            };
            const roleValue = roleMap[roleText] || 'user';

            openEditModal(id, log, username, roleValue);
        });
    });

    document.querySelectorAll('.btn-delete').forEach(btn => {
        btn.addEventListener('click', function(e) {
            if (!confirm('Вы действительно хотите удалить пользователя?')) {
                e.preventDefault();
            }
        });
    });
</script>

";
        // line 169
        yield from $this->load("components/notification.twig", 169)->unwrap()->yield($context);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "admin/editusers.twig";
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
        return array (  281 => 169,  198 => 88,  194 => 86,  189 => 83,  181 => 80,  174 => 76,  170 => 74,  168 => 73,  164 => 72,  157 => 69,  155 => 68,  154 => 61,  149 => 59,  145 => 58,  141 => 57,  138 => 56,  134 => 55,  121 => 44,  119 => 43,  84 => 10,  77 => 9,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "admin/editusers.twig", "C:\\OSPanel\\domains\\localhost\\templates\\admin\\editusers.twig");
    }
}
