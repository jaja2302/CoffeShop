<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use Filament\Forms\Concerns\InteractsWithForms;
use Filament\Forms\Contracts\HasForms;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Concerns\InteractsWithTable;
use Filament\Tables\Contracts\HasTable;
use Filament\Tables\Table;
use Illuminate\Contracts\View\View;
use App\Models\Category;
use App\Models\Menu;
use Filament\Tables\Actions\CreateAction;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Checkbox;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\TimePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Actions\Action;
class AdminMenumanagement extends Component implements HasForms, HasTable
{
    use InteractsWithTable;
    use InteractsWithForms;
    
    public function table(Table $table): Table
    {
        return $table
            ->query(Menu::query())
            ->headerActions([
                CreateAction::make()
                ->model(Menu::class)
                ->modalHeading('Add new Menu Item')
                ->label('Add new Menu Item')
                ->closeModalByClickingAway(false)
                ->form([
                    TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                    TextInput::make('description')
                    ->required()
                    ->maxLength(255),
                    TextInput::make('price')
                    ->required()
                    ->numeric(),
                    Select::make('category_id')
                    ->createOptionForm([
                        TextInput::make('name')
                        ->maxLength(15)
                        ->required(),
                    ])
                    ->createOptionUsing(function (array $data): int {
                        return Category::create($data)->getKey();
                    })
                    ->options(Category::all()->pluck('name', 'id'))
                    ->required(),
                    FileUpload::make('image')
                    ->required()
                    ->image()
                    ->directory('menu-items'),
                ])
                ->modalWidth('5xl')
                ->createAnother(false)
                // ->visible(checking_user())
                ->successNotification(null)
                // ->using(function (array $data, string $model): MaintanceHistory {
                //     // dd($data);
                //     $input = save_data_maintence($data,  $model);
                //     return $input['models'];
                // })
            ])
            ->columns([
                TextColumn::make('name'),
                TextColumn::make('description'),
                TextColumn::make('price'),
                TextColumn::make('category.name'),
                TextColumn::make('created_at'),
                TextColumn::make('updated_at'),
            ])
            ->filters([
                // ...
            ])
            ->actions([
                // ...
            ])
            ->bulkActions([
                // ...
            ]);
    }

    public function render() : View
    {
        return view('livewire.admin.admin-menumanagement')
        ->layout('components.layouts.admin');
    }
}
