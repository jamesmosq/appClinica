<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Cita;

use MoonShine\Laravel\Resources\ModelResource;
use MoonShine\UI\Components\Layout\Box;
use MoonShine\UI\Fields\ID;
use MoonShine\UI\Fields\Number;
use MoonShine\UI\Fields\Date;
use MoonShine\UI\Fields\Enum;
use MoonShine\UI\Fields\Text;
use MoonShine\Contracts\UI\FieldContract;
use MoonShine\Contracts\UI\ComponentContract;

/**
 * @extends ModelResource<Cita>
 */
class CitaResource extends ModelResource
{
    protected string $model = Cita::class;

    protected string $title = 'Cita';
    protected string $description = 'Listado de citas';

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
                Number::make('ID Mascota','mascota_id')->required(),
                Number::make('ID Veterinario','veterinario_id')->required(),
                Date::make('Fecha y hora cita','fecha_hora'),
                Text::make('Motivo Cita','motivo'),
                Enum::make('Estado cita','estado', ['Programada', 'En Proceso', 'Completada', 'Cancelada'])->default('Programada'),
                Text::make('Diagnostico','diagnostico'),
                Text::make('Tratamiento','tratamiento'),
                


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
     * @param Cita $item
     *
     * @return array<string, string[]|string>
     * @see https://laravel.com/docs/validation#available-validation-rules
     */
    protected function rules(mixed $item): array
    {
        return [];
    }
}
