using System;
using System.Collections;
using System.Collections.Generic;
using System.Text;
namespace Makkuraga
{
    #region Mechanic
    public class Mechanic
    {
        #region Member Variables
        protected int _id;
        protected string _name;
        protected string _location;
        #endregion
        #region Constructors
        public Mechanic() { }
        public Mechanic(string name, string location)
        {
            this._name=name;
            this._location=location;
        }
        #endregion
        #region Public Properties
        public virtual int Id
        {
            get {return _id;}
            set {_id=value;}
        }
        public virtual string Name
        {
            get {return _name;}
            set {_name=value;}
        }
        public virtual string Location
        {
            get {return _location;}
            set {_location=value;}
        }
        #endregion
    }
    #endregion
}