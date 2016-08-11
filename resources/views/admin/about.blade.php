@extends('admin.layout')
@extends('admin.partials.header')
@extends('admin.partials.drawer')

@section('body')
	<div class="body profiles-body subscribers-body mdl-color--white mdl-shadow--2dp mdl-cell mdl-cell--12-col">
		<h2>Опсание версии</h2>
		<div class="about">
			<p>Основной функционал этой версии:</p>
			<ul>
				<li>Добавление статей</li>
				<li>Добавление профайлов</li>
				<li>Добавление вакансий</li>
				<li>Загрузка списка подписчиков</li>
				<li>Управление администраторами</li>
				<li>Добавление отчетов и документов</li>
			</ul>
			<p>Для управления контентом используются соответвующие разделы административной панели.</p>
			<p>Мы рекоммендуем заполнять все поля и все языковые версии для всех типов контента.</p>
			<p>Особенности редактирования типов контента</p>
			<p>Всмопогательные контент</p>
			<ul>
				<li>
					Категории
					<ul>
						<li>Категории служат для распределения профайлов и вакансий</li>
						<li>Все поля являются обязательными для заполнения!</li>
						<li>Для того, что бы выбрать категорию в вакансии или профайле сначала воспользуйтесь пунтком меню - "Добавить категорию"</li>
						<li>Вы можете изменять и удалять любую категорию, кроме "Default" категории.</li>
						<li>При удалении категории, все вакансии и профайлы, с этой категорией, будут автоматически перемещены в категорию "Default".</li>
					</ul>
				</li>
				<li>
					Проекты
					<ul>
						<li>Проекты служат для распределения новостей с типом "Проект"</li>
						<li>Проекты принадлежат трем категориям.</li>
						<li>Для того, что бы выбрать проект при создании новости сначала воспользуйтесь пунтком меню - "Добавить проект"</li>
						<li>Вы можете изменять и удалять любой проект, кроме "Default" проекта.</li>
						<li>При удалении проекта, все новости, с этим проетом, будут автоматически перемещены в проект "Default".</li>
					</ul>
				</li>
			</ul>
			<p>Основной контент</p>
			<ul>
				<li>
					Новости
					<ul>
						<li>Практически весь текстовый контент на сайте - новость.</li>
						<li>Для выбора категории(Грант, Событие, итд) воспользуйтесь выпадющим списком.</li>
						<li>Заполняйте все поля для всех языковый версий, это сохранит целостность контента.</li>
						<li>Вы можете выбрать любое время публикации новости.</li>
						<li>В списке всех новостей вы видите и русские и украинские версии.</li>
						<li>Вы не можете удалить только одну языковую версию. При удалении будет удалены все языковые версии.</li>
						<li>В разделе "Общая информация" находится общая информация для всех языковых версий.</li>
						<li>"Ссылка" - уникальный адрес каждой статьи, по которому отображаются обе версии статьи, вы можете пропустить этот пункт и перейти к заполоению украинского названия. Система автоматически создаст ссылку, вы моежет отредактировать ее или создать свою.</li>
						<li>Meta-title. Если вы не заполните meta-title, он будет определен автоматически и будет таким-же как заголовок статьи.</li>
						<li>Meta-description. Если вы не заполните meta-description, он будет определн автоматически и будет таким-же как и короткое описание статьи.</li>
						<li>Превью. Превью - котроткое описание статьи, которое выводится в списке статей. Максимальная длинна 128 символов.</li>
						<li>Статья обязательно должна иметь заголовок, миниатюру, превью и текст.</li>
					</ul>
				</li>
				<li>
					<ul>
						Профайлы
						<li>Для выбора категории воспользуйтесь выпадющим списком.</li>
						<li>Заполняйте все поля для всех языковый версий, это сохранит целостность контента.</li>
						<li>Вы можете выбрать любое время публикации.</li>
						<li>Meta-title. Если вы не заполните meta-title, он будет определен автоматически и будет таким-же как имя.</li>
						<li>Meta-description. Если вы не заполните meta-description, он будет определн автоматически и будет таким-же как описание.</li>
						<li>Профайл обязательно должен иметь название, описание и файл.</li>
						<li>Каждая языковая версия имеет свой файл.</li>
						<li>Так как файл является основным контентом, после загрузки файла, он не может быть изменен.</li>

					</ul>
				</li>
				<li>
					<ul>
						Вакансии
						<li>Для выбора категории воспользуйтесь выпадющим списком.</li>
						<li>Заполняйте все поля для всех языковый версий, это сохранит целостность контента.</li>
						<li>Вы можете выбрать любое время публикации.</li>
						<li>Meta-title. Если вы не заполните meta-title, он будет определен автоматически и будет таким-же как навание.</li>
						<li>Meta-description. Если вы не заполните meta-description, он будет определн автоматически и будет таким-же как описание.</li>
						<li>Вакансия обязательно должна иметь название, описание и файл.</li>
						<li>Каждая языковая версия имеет свой файл.</li>
						<li>Так как файл является основным контентом, после загрузки файла, он не может быть изменен.</li>
					</ul>
				</li>
				<li>
					<ul>
						Отчеты
						<li>Для выбора категории воспользуйтесь выпадющим списком.</li>
						<li>Заполняйте все поля для всех языковый версий, это сохранит целостность контента.</li>
						<li>Вы можете выбрать любое время публикации.</li>
						<li>Meta-title. Если вы не заполните meta-title, он будет определен автоматически и будет таким-же как название.</li>
						<li>Meta-description. Если вы не заполните meta-description, он будет определн автоматически и будет таким-же как описание.</li>
						<li>Отчет обязательно должен иметь название, описание и файл.</li>
						<li>Каждая языковая версия имеет свой файл.</li>
						<li>Так как файл является основным контентом, после загрузки файла, он не может быть изменен.</li>
					</ul>
				</li>
			</ul>
			<p>Meta-аттрибуты</p>
			<ul>
				<li>
					Meta-title
					<ul>
						<li>Метатег title сообщает поисковой системе, каким оптимизатор хотел бы видеть заголовок страницы сайта в выдаче. Роботы придают большее значение содержанию обычного тега title, поэтому в meta title рекомендуется прописывать максимально похожую информацию.</li>
						<li>title должен быть заполнен в обязательном порядке, иначе страница не будет ранжироваться; </li>
						<li>
							ограничение по длине тайтла составляет 60-120 символов. Так как на странице выдачи выводится максимум 70 знаков, лучше прописывать title в рамках этого объема;
						</li>
						<li>тайтл должен коротко и ясно отражать суть данной страницы, т.е. должен быть максимально релевантным тексту. В обратном случае поисковые системы могут выбрать его самостоятельно;</li>
						<li>для каждой страницы, если это возможно, title должен быть уникальным;</li>
						<li>Тег title выводится как заголовок страницы в поисковой выдаче (над адресом страницы). От того, насколько информативным и привлекательным будет его содержание, зависит, перейдут ли пользователи по ссылке. Поэтому тайтлы рекомендуется делать продающими: использовать частицы «как», «где», указывать конкурентные преимущества товара и/или услуги и т.д.</li>
					</ul>
				</li>
				<li>
					Meta-description
					<ul>
						<li>Мета тег description предназначен для создания краткого описания страницы. Его содержимое может использоваться поисковыми системами для формирования сниппета. Данный тег не влияет на внешний вид страницы, так как является служебной информацией.</li>
						<li>Мета тег description может влиять на позиции сайта в выдаче тех поисковых систем, которые его учитывают (в частности, Google). Кроме того, посетители, просматривая серп, читают описания предлагаемых страниц. Именно сниппет, который формируется с учетом прописанной в мета теге description информации, помогает пользователю принять окончательное решение — перейти или нет на предлагаемый поисковой системой сайт.</li>
						<li>Размер description не должен превышать 150-200 символов. Именно такой объем текста помещается в результате выдачи (под ссылкой на страницу). Если длина тега будет больше этого значения, то описание получится незаконченным.</li>
						<li>Тег должен описывать содержание конкретной страницы. Текст должен быть понятным и лаконичным, не рекомендуется использовать общие фразы.</li>
						<li>Тег description должен отличаться от тега title.</li>
						<li>Description должен быть привлекательным для пользователей, давать представление о той информации, которую они найдут на описываемой странице, рассказывать о преимуществах товара или услуги.</li>
					</ul>
				</li>
				<li>
					Meta-keywords
					<ul>
						<li>Ключевые слова, помогают поисковым системам лучше ранжировать сайт или конкретную страницу.</li>
						<li>Рекомендованное количество слов в мета-теге Keywords — не более десяти.</li>
						<li>Список слов разделяется запятыми</li>
					</ul>
				</li>
			</ul>
			<p>Подписки и подписчики</p>
			<ul>
				<li>Подписчики - раздел для просмотра и выгрузки списка подпившихся на рассылку</li>
				<li>Вы можете выгрузить весь список подписчиков в двух форматах - .csv или .xlsx - это самы распостраненные форматы для импорта в сервисы создания рассылок.</li>
			</ul>
			<p>Администарторы</p>
			<ul>
				<li>Вы можете создавать, изменять и удалять администраторов.</li>
				<li>Всегда используйте релаьный email, он нужен для восстановления пароля.</li>
				<li>Отличие Мастер-админа и просто администратора в полномочиях. Мастер-админ может редактировать других админов, создавать новых, а также реадктировать и удалять контент созданных другими админами. Администратор может редактировать и удалять только свой конетнт.</li>
				<li>При удалении администратора весь его конент будет переназначен "Unknown" администратору.</li>
				<li>Unknown администратор не может быть удален.</li>
			</ul>
		</div>
	</div>
@stop



