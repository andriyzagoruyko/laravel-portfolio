@extends('auth.layouts.master')

@section('title', 'Технології')

@section('content')
    <div class="content__block content__buttons">
        <a href="{{ route('technologies.create') }}" class="btn btn-success">Додати технологію</a>
    </div>
    <section class="content__block content__section section">
        <div class="section__header"><h2>Список технологій</h2></div>
        <div class="section__body">
            <table class="table">
                <tbody>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        Лого
                    </th>
                    <th>
                        Назва
                    </th>
                    <th class="actions">
                        Дії
                    </th>
                </tr>
                @foreach($technologies as $technology)
                    <tr>
                        <td>
                            {{ $technology->id }}
                        </td>

                        <td>
                            <img src="{{  $technology->getLogoUrl() }}" alt="{{ $technology->name }}" width="30">
                        </td>

                        <td>
                            {{ $technology->name }}
                        </td>

                        <td class="actions">
                            <form action="{{ route('technologies.destroy', $technology) }}" method="POST">
                                <a href="{{ route("technologies.edit", $technology->id) }}" class="btn btn-primary">
                                    <div class="icon"><img src="/assets/admin/img/icons/edit.svg" alt=""></div>
                                </a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">
                                    <span class="icon"><img src="/assets/admin/img/icons/remove.svg" alt=""></span>
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
@endsection