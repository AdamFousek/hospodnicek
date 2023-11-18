import type { GlobalThemeOverrides } from 'naive-ui'

/**
 * Use this for type hints under js file
 * @type import('naive-ui').GlobalThemeOverrides
 */
export default {
    common: {
        primaryColor: '#752642',
        primaryColorHover: '#d75c77',
    },
    Button: {
        textColor: '#752642'
    },
    Select: {
        peers: {
            InternalSelection: {
                textColor: '#752642'
            }
        }
    }
} as GlobalThemeOverrides