<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Layout;

use App\Models\Audiofile;
use App\Models\Diktor;
use App\Models\FileUser;

class PlatformScreen extends Screen
{
    /**
     * Fetch data to be displayed on the screen.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'metrics' => [
                'roliki' => ['value' => Audiofile::all()->count()],
                'diktors'   => ['value' => Diktor::all()->count()],
                'file_user'   => ['value' => FileUser::all()->count()],
            ],

        ];
    }

    /**
     * The name of the screen displayed in the header.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'zvuk.fm';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return 'Производство аудио рекламы, профессиональные дикторские голоса';
    }

    /**
     * The screen's action buttons.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make('Перейти на сайт')
                ->href(route("home"))
                ->icon('globe-alt'),
        ];
    }

    /**
     * The screen's layout elements.
     *
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::metrics([
                'Аудиороликов' => 'metrics.roliki',
                'Дикторов' => 'metrics.diktors',
                'Пользователей которые могут скачивать файлы' => 'metrics.file_user',
            ]),
        ];
    }
}
