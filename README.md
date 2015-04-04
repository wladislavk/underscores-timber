# underscores-timber

Timber is a Wordpress plugin that lets you create Twig templates and use them for Wordpress theming. Timber includes a starter theme out of the box, however, if you prefer using different starter themes such as Underscores, then you might wonder how to use Timber with them.

This repository contains a child theme with generic Underscores theme as a parent. It also uses Woocommerce. 100% of HTML (well, except the HTML that was included in Woocommerce and was not overridden, e.g. checkout page) is contained in Twig templates. The templates are not included and should be project-specific. Woocommerce mini-cart widget was completely overridden with custom HTML since it proved to be easier than tweaking.

This repository is not designed for production use and contains some project-specific data, however, it can give general idea of creating a Timber child of a non-Timber parent theme.
