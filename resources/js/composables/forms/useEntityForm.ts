import { useForm } from '@inertiajs/vue3'
import { InertiaForm } from '@inertiajs/vue3';

interface Entity {
    translates?: Array<{
        locale_code: string;
    }>;
}

export interface Form {
    locales: {
        [key: string]: {
            [key: string]: any;
        }
    };
    static: {
        [key: string]: any;
    }
    [key: string]: any;
}


export function useEntityForm(activeLocale: string, entity: Entity) {
    console.log(entity)
    const form: InertiaForm<Form> = useForm({
        locales: entity.translates
            ? entity.translates.reduce<Record<string, typeof entity.translates[number]>>
            ((acc, translate) => {
                acc[translate.locale_code] = translate;
                return acc;
            }, {})
            : {
                [activeLocale]: {},
            },
        static: entity ? Object.fromEntries(
            Object.entries(entity).filter(([key]) => !['id', 'translates', 'created_at', 'updated_at', 'media'].includes(key))
        ) : {}
    });
    console.log(form)

    return {
        form
    }
}
