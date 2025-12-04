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

/* home/about.twig */
class __TwigTemplate_8b7a8be9c5b4ec4cb3ecd75d99a39693 extends Template
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
        yield "О Сайте";
        yield from [];
    }

    // line 5
    /**
     * @return iterable<null|scalar|\Stringable>
     */
    public function block_content(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 6
        yield "<div class=\"content-wrapper\">
    <h1>О Сайте</h1>
    <p>Добро пожаловать на наш сайт, где мы предлагаем широкий спектр услуг по обслуживанию компьютеров, принтеров и заправке картриджей.</p>
    <p>Мы готовы помочь вам поддерживать ваши компьютеры и офисное оборудование в отличном состоянии для бесперебойной работы вашего отдела.</p>
    <p>Обслуживание компьютеров и принтеров — это не только профилактика и ремонт, но и оптимизация работы вашего отдела.</p>
    <p>Регулярное техническое обслуживание поможет предотвратить непредвиденные сбои и увеличить срок службы оборудования.</p>
    <p>Наша заправка картриджей также позволяет сэкономить ваше время и обеспечить высокое качество печати без необходимости посещения нашего отдела лично.</p>
    <p>Мы гарантируем высокое качество обслуживания, профессиональный подход к каждому заказу и оперативное реагирование на любые проблемы с вашим оборудованием.</p>

    <br>

    <p>Обслуживание компьютеров и принтеров играет решающую роль в надежной работе вашего отдела.</p>
    <p>Регулярное техническое обслуживание помогает предотвратить непредвиденные сбои и увеличить срок службы оборудования.</p>
    <p>Это также способствует оптимизации производительности и снижению риска возникновения проблем во время работы.</p>
    <p>Поддерживая ваши компьютеры и принтеры в хорошем состоянии, вы обеспечиваете бесперебойную работу вашего отдела и сохраняете эффективность рабочего процесса.</p>

    <br>

    <p><strong>В работу отдела СКСиС входят следующие обязанности:</strong></p>
    <ul>
        <li>Замена и заправка картриджей;</li>
        <li>Ремонт и обслуживание принтеров и техники;</li>
        <li>Настройка оборудования в аудиториях;</li>
    </ul>

    <br>

    <p>Если у вас появятся вопросы, то можете задать их начальнику отдела на номер: +7 (964) 477-62-88</p>
</div>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "home/about.twig";
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
        return array (  70 => 6,  63 => 5,  52 => 3,  41 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "home/about.twig", "C:\\OSPanel\\domains\\localhost\\templates\\home\\about.twig");
    }
}
