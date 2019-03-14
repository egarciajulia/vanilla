/*
 * @author Stéphane LaFlèche <stephane.l@vanillaforums.com>
 * @copyright 2009-2019 Vanilla Forums Inc.
 * @license GPL-2.0-only
 */

import * as React from "react";
import classNames from "classnames";
import DropDownItem from "./DropDownItem";
import Heading from "@library/components/Heading";
import DropDownItemSeparator from "@library/components/dropdown/items/DropDownItemSeparator";
import { dropDownClasses } from "@library/styles/dropDownStyles";

interface IProps {
    title: string;
    className?: string;
    level?: 2 | 3;
    children: React.ReactNode;
}

/**
 * Implements DropDownSection component. It add a heading to a group of elements in a DropDown menu
 */
export default class DropDownSection extends React.Component<IProps> {
    public render() {
        const classes = dropDownClasses();
        return (
            <React.Fragment>
                <DropDownItemSeparator />
                <DropDownItem className={classNames("dropDown-section", classes.section, this.props.className)}>
                    <Heading
                        title={this.props.title}
                        className={classNames("dropDown-sectionHeading", classes.sectionHeading)}
                    />
                    <ul className={classNames("dropDown-sectionContents", classes.sectionContents)}>
                        {this.props.children}
                    </ul>
                </DropDownItem>
            </React.Fragment>
        );
    }
}
