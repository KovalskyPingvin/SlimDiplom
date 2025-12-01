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

/* application/cartridge_form.twig */
class __TwigTemplate_568b8e0f722b08d6ccf7af187eb502f2 extends Template
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
        yield "Подача заявки на замену картриджа";
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
        yield "    <link rel=\"stylesheet\" href=\"/css/application/sendingstyle.css\">
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
        yield "<div class=\"container-form\">
    <h1>Заполните форму заявки</h1>

    <form id=\"templateForm\" method=\"post\">
        <div>
            <label for=\"departmentName\">Название отдела:</label>
            <input type=\"text\" id=\"departmentName\" name=\"departmentName\" required>
        </div>
        <div>
            <label for=\"chiefName\">ФИО начальника отдела (От кого?):</label>
            <input type=\"text\" id=\"chiefName\" name=\"chiefName\" required>
        </div>
        <div>
            <label for=\"phone\">Телефон:</label>
            <input type=\"text\" id=\"phone\" name=\"phone\" required>
        </div>
        <div>
            <label for=\"printerName\">Название принтера:</label>
            <input type=\"text\" id=\"printerName\" name=\"printerName\" required>
        </div>
        <div>
            <label for=\"inventoryNumber\">Инвентарный номер:</label>
            <input type=\"text\" id=\"inventoryNumber\" name=\"inventoryNumber\" required>
        </div>
        <div>
            <label for=\"buildingNumber\">Номер корпуса:</label>
            <input type=\"text\" id=\"buildingNumber\" name=\"buildingNumber\" required>
        </div>
        <div>
            <label for=\"roomNumber\">Номер кабинета:</label>
            <input type=\"text\" id=\"roomNumber\" name=\"roomNumber\" required>
        </div>
        <div>
            <label for=\"reason\">Причина:</label>
            <textarea id=\"reason\" name=\"reason\" required></textarea>
        </div>
        <div class=\"button-group\">
            <button type=\"submit\" class=\"button-send button-green\">Отправить</button>
        </div>
    </form>
</div>

<div id=\"webOutput\"></div>

<div id=\"modal-sending\" class=\"modal-sending\">
  <div class=\"modal-content\">
    <p id=\"modal-sending-message\"></p>
    <button onclick=\"closeModalSending()\">Закрыть</button>
  </div>
</div>

<script>
function closeModalSending() {
    document.getElementById('modal-sending').classList.remove('active');
}

document.getElementById('templateForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('/sending/submit', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // ← Убедись, что получаем JSON
    .then(data => {
        document.getElementById('modal-sending-message').textContent = data.message;
        document.getElementById('modal-sending').classList.add('active');
        if (data.success) {
            this.reset();
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        document.getElementById('modal-sending-message').textContent = 'Ошибка отправки заявки.';
        document.getElementById('modal-sending').classList.add('active');
    });
});
</script>

";
        // line 91
        yield from $this->load("components/notification.twig", 91)->unwrap()->yield($context);
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "application/cartridge_form.twig";
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
        return array (  167 => 91,  84 => 10,  77 => 9,  71 => 6,  64 => 5,  53 => 3,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("{% extends 'layouts/base.twig' %}

{% block title %}Подача заявки на замену картриджа{% endblock %}

{% block extra_css %}
    <link rel=\"stylesheet\" href=\"/css/application/sendingstyle.css\">
{% endblock %}

{% block content %}
<div class=\"container-form\">
    <h1>Заполните форму заявки</h1>

    <form id=\"templateForm\" method=\"post\">
        <div>
            <label for=\"departmentName\">Название отдела:</label>
            <input type=\"text\" id=\"departmentName\" name=\"departmentName\" required>
        </div>
        <div>
            <label for=\"chiefName\">ФИО начальника отдела (От кого?):</label>
            <input type=\"text\" id=\"chiefName\" name=\"chiefName\" required>
        </div>
        <div>
            <label for=\"phone\">Телефон:</label>
            <input type=\"text\" id=\"phone\" name=\"phone\" required>
        </div>
        <div>
            <label for=\"printerName\">Название принтера:</label>
            <input type=\"text\" id=\"printerName\" name=\"printerName\" required>
        </div>
        <div>
            <label for=\"inventoryNumber\">Инвентарный номер:</label>
            <input type=\"text\" id=\"inventoryNumber\" name=\"inventoryNumber\" required>
        </div>
        <div>
            <label for=\"buildingNumber\">Номер корпуса:</label>
            <input type=\"text\" id=\"buildingNumber\" name=\"buildingNumber\" required>
        </div>
        <div>
            <label for=\"roomNumber\">Номер кабинета:</label>
            <input type=\"text\" id=\"roomNumber\" name=\"roomNumber\" required>
        </div>
        <div>
            <label for=\"reason\">Причина:</label>
            <textarea id=\"reason\" name=\"reason\" required></textarea>
        </div>
        <div class=\"button-group\">
            <button type=\"submit\" class=\"button-send button-green\">Отправить</button>
        </div>
    </form>
</div>

<div id=\"webOutput\"></div>

<div id=\"modal-sending\" class=\"modal-sending\">
  <div class=\"modal-content\">
    <p id=\"modal-sending-message\"></p>
    <button onclick=\"closeModalSending()\">Закрыть</button>
  </div>
</div>

<script>
function closeModalSending() {
    document.getElementById('modal-sending').classList.remove('active');
}

document.getElementById('templateForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const formData = new FormData(this);

    fetch('/sending/submit', {
        method: 'POST',
        body: formData
    })
    .then(response => response.json()) // ← Убедись, что получаем JSON
    .then(data => {
        document.getElementById('modal-sending-message').textContent = data.message;
        document.getElementById('modal-sending').classList.add('active');
        if (data.success) {
            this.reset();
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        document.getElementById('modal-sending-message').textContent = 'Ошибка отправки заявки.';
        document.getElementById('modal-sending').classList.add('active');
    });
});
</script>

{% include 'components/notification.twig' %}
{% endblock %}", "application/cartridge_form.twig", "D:\\OSPanel\\domains\\slimdiplom\\templates\\application\\cartridge_form.twig");
    }
}
