<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mascota;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Text;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Enum;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\HasMany;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;

/**
 * @extends ModelResource<Mascota>
 */
class MascotaResource extends ModelResource
{
    protected string $model = Mascota::class;

    protected string $title = 'Mascota';

    protected bool $indexShowDetailsRow = true;

    protected bool $createInModal = true;

    protected bool $editInModal = true;

    protected bool $detailInModal = false;


    /**
     * @return list<FieldContract>
     */
    protected function indexFields(): iterable
    {
        return [
            ID::make()->sortable(),
            
            
        ];
    }

    /**
     * @return list<ComponentContract|FieldContract>
     */
    protected function formFields(): iterable
    {
        return [
            Box::make([
                ID::make(),
                Text::make('Nombre','nombre')->required(),
                Number::make('Id Dueño','dueno_id')->required(),
                Text::make('Especie','especie')->required(),
                Text::make('Raza','raza')->required(),
                Date::make('Fecha de Nacimiento','fecha_nacimiento')->required(),
                Enum::make('Sexo','sexo')->options(['Macho', 'Hembra'])->required(),
                Number::make('Peso','peso')->required(),
                Text::make('Historial medico','historial_medico')->required(),

            ])
        ];
    }

    /**
     * @return list<FieldContract>
     */
    protected function detailFields(): iterable
    {
        return [
            ID::make(),
        ];
    }

    /**
     * @param Mascota $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
